<template>
    <div>
        <div class="form-group">
            <header id = "songs-heading">Songs</header> 
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table" id = "myTable">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Artist</th>
                        <th>Album</th>
                        <th>Genre</th>
                        <th>Year</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="song, index in songs">
                        <td>{{ song.title }}</td>
                        <td>{{ song.artist }}</td>
                        <td>{{ song.album }}</td>
                        <td>{{ song.genre }}</td>
                        <td>{{ song.year }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
            // array of songs
                songs: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/audionet/public/api/songs')
                .then(function (resp) {
                    app.songs = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    // if it fails throw error msg
                    alert("Could not load songs");
                });
        }
    }
</script>