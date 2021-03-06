{
 "cells": [
  {
   "cell_type": "code",
   "execution_count": 9,
   "metadata": {},
   "outputs": [],
   "source": [
    "import pandas as pd\n",
    "import sys\n",
    "\n",
    "triplets_file = 'https://static.turi.com/datasets/millionsong/10000.txt'\n",
    "songs_metadata_file = 'https://static.turi.com/datasets/millionsong/song_data.csv'\n",
    "\n",
    "song_df_1 = pd.read_table(triplets_file,header=None)\n",
    "song_df_1.columns = ['user_id', 'song_id', 'listen_count']\n",
    "\n",
    "song_df_1.head()\n",
    "\n",
    "song_df_2 =  pd.read_csv(songs_metadata_file)\n",
    "song_df = pd.merge(song_df_1, song_df_2.drop_duplicates(['song_id']), on=\"song_id\", how=\"left\")\n",
    "\n",
    "song_df.head()\n",
    "\n",
    "song_df['song'] = song_df[\"artist_name\"] + ' - ' + song_df[\"title\"]\n",
    "\n",
    "song_grouped = song_df.groupby(['song']).agg({'listen_count': 'count'}).reset_index()\n",
    "grouped_sum = song_grouped['listen_count'].sum()\n",
    "song_grouped['percentage']  = song_grouped['listen_count'].div(grouped_sum)*100\n",
    "song_grouped.sort_values(['listen_count', 'song'], ascending = [0,1])\n",
    "\n",
    "users = song_df['user_id'].unique()\n",
    "len(users) ## return 365 unique users\n",
    "songs = song_df['song'].unique()\n",
    "len(songs) ## return 5151 unique songs\n",
    "\n",
    "from sklearn.model_selection import train_test_split\n",
    "\n",
    "train_data, test_data = train_test_split(song_df, test_size = 0.20, random_state=0)\n",
    "\n",
    "from Recommenders import popularity_recommender_py\n",
    "\n",
    "pm = popularity_recommender_py()\n",
    "pm.create(train_data, 'user_id', 'song')\n",
    "#user the popularity model to make some prediction\n",
    "user_id = users[5]\n",
    "listofrecommendedsongs = pm.recommend(user_id).to_json(orient='split')\n",
    "\n",
    "from bottle import * \n",
    "@get('/listofsongs')\n",
    "def result_list():\n",
    "    return listofrecommendedsongs\n",
    "run(host=\"localhost\", port=\"8080\")\n",
    "\n",
    "\n",
    "\n",
    "\n",
    "\n"
   ]
  }
 ],
 "metadata": {
  "kernelspec": {
   "display_name": "Python 3",
   "language": "python",
   "name": "python3"
  },
  "language_info": {
   "codemirror_mode": {
    "name": "ipython",
    "version": 3
   },
   "file_extension": ".py",
   "mimetype": "text/x-python",
   "name": "python",
   "nbconvert_exporter": "python",
   "pygments_lexer": "ipython3",
   "version": "3.7.0"
  }
 },
 "nbformat": 4,
 "nbformat_minor": 2
}
