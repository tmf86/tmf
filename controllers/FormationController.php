<?php


namespace Contoller;


use Model\Formation;
use Model\Videos;

class FormationController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $fm = new Formation();
        $vd = new Videos();
        $user_image = $this->getUserImage();
        $links = [sprintf('<link rel="stylesheet" href="%s" type="text/css" media="screen"/>', makeRootOrFileUrl('public/css/import/venobox/venobox.min.css'))];
        $scripts = [
            sprintf('<script type="text/javascript" src="%s"></script>', makeRootOrFileUrl('public/js/import/venobox/venobox.min.js')),
            "<script>
                $(function(){ 
                    $('.venobox').venobox(
                        {
                            closeBackground : 'rgba(0,0,0,0.5)',
                            closeColor : '#fff',
                            bgcolor    : 'rgba(0,0,0,0.5)'
                        }
                    )
                })
            </script>"
        ];
        if ($this->request->hasGetKey('id')) {
            $videos = $vd->show_formation_videos($this->request->id);
            $this->load_views("pages.cours", compact("videos", "scripts", 'links', 'user_image'));
        } else {
            $formations = $fm->show_all();
            $this->load_views("pages.formation", compact("formations", 'user_image'));
        }
    }
}