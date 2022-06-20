<?php class SCRAPMANGA_Ajax_Admin {
   
    public function view_chapters() {
        if( isset( $_POST[ 'action' ] ) ) {

            $urlManga = $_POST['urlManga'];

            require_once SCRAPMANGA_DIR_PATH . 'helpers/hquery/hquery.php';

            $doc = hQuery::fromUrl($urlManga, ['Accept' => 'text/html,application/xhtml+xml;q=0.9,*/*;q=0.8' , 'user_agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36']);

            $listChapters = $doc->find('.row-content-chapter .a-h');

            $chapters = array();

            foreach ($listChapters as $key => $lch) 
            {
                $chapter_link = $lch->find('a')->attr('href');
                $chapter_name = $lch->find('a')->text();
                $chapters[] = array( 'name' => $chapter_name, 'link' => $chapter_link );
            }
        
   
            $res = [
                'res'      => 'conexion',
                'urlManga' => $urlManga,
                'chapters' => $chapters
            ];
            echo json_encode($res);
            wp_die();
        }
    }
}