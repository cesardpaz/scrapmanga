import axios from "axios";

const viewChapter = document.querySelector('#view-chapters');
if(viewChapter){
    viewChapter.addEventListener('click', function(e){
        e.preventDefault();
        const urlManga = document.querySelector('#urls_scrapp').value;

        if( urlManga == false || urlManga == '' ) return;

        var params = new URLSearchParams();
        params.append('action', 'action_view_chapters');
        params.append('urlManga', urlManga);
        
        axios.post(scrapmanga_Admin.url, params)
        .then(function(res) {
            if(res.status == 200) {
                const listChapters = res.data.chapters;
                console.log(listChapters)
            }
        })
        .catch(function(err) {
            console.error(err);
        })
        .then(function() {
            
        });
        
    });
}