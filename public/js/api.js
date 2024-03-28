// fetch('https://phimapi.com/phim/nu-sinh-bat-ma')
//     .then(response => response.json())
//     .then(data => {
//         const videoUrl = data.episodes[0].server_data[0].link_m3u8;
//         const videoSource = document.getElementById('videoSource');
//         videoSource.src = videoUrl;
//         const videoPlayer = document.getElementById('videoPlayer');
//         videoPlayer.load();
//     })
//     .catch(error => {
//         console.log('error',error);
//     })