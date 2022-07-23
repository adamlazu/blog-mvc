<?php
class Flash{
    public static function setFlash($pesan,$tipe){
        $_SESSION['flash']= array(
            'pesan'=>$pesan,
            'tipe'=>$tipe
        );
    }

    public static function getFlash(){
        if(isset($_SESSION['flash'])){
            if(is_array($_SESSION["flash"]["pesan"])){
                echo '<div class="alert alert-'.$_SESSION['flash']['tipe'].' mt-2" role="alert">
                <ul>';
                foreach($_SESSION['flash']['pesan'] as $pesan){
                    echo '<li>'.$pesan.'</li>';
                }
                echo'</ul>
                </div>';
            }else{
                echo '<div class="alert alert-'.$_SESSION['flash']['tipe'].'" role="alert">
                '.$_SESSION["flash"]["pesan"].'
                </div>';
            }
        }
        unset($_SESSION['flash']);
    }

}
?>