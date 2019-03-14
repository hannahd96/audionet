import pandas as pd
import sys

triplets_file = 'https://static.turi.com/datasets/millionsong/10000.txt'
songs_metadata_file = 'song_data.csv'

# data = pd.DataFrame(list(data.find()));

song_df_1 = pd.read_csv(triplets_file,header=None)
song_df_1.columns = ['user_id', 'song_id', 'listen_count']

song_df_2 =  pd.read_csv(songs_metadata_file)
song_df = pd.merge(song_df_1, song_df_2.drop_duplicates(['song_id']), on="song_id", how="left")

song_df['song'] = song_df["artist_name"] + ' - ' + song_df["title"]

data_f = pd.DataFrame(data=song_df);

song_grouped = song_df.groupby(['song']).agg({'listen_count': 'count'}).reset_index()
grouped_sum = song_grouped['listen_count'].sum()
song_grouped['percentage']  = song_grouped['listen_count'].div(grouped_sum)*100
song_grouped.sort_values(['listen_count', 'song'], ascending = [0,1])

users = song_df['user_id'].unique()
len(users) ## return 365 unique users
songs = song_df['song'].unique()
len(songs) ## return 5151 unique songs

from sklearn.model_selection import train_test_split

train_data, test_data = train_test_split(song_df, test_size = 0.20, random_state=0)

from Recommenders import popularity_recommender_py

pm = popularity_recommender_py()
pm.create(train_data, 'user_id', 'song')
#user the popularity model to make some prediction
user_id = users[5]
listofrecommendedsongs = pm.recommend(user_id).to_json(orient='split')

print(listofrecommendedsongs)