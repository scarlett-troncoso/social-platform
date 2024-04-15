<div class="container py-4 w-75"> 
    <h2 class="w-75">Stampa 2 istanze Post</h2>
    <?php foreach($posts as $post) : ?>
        <div class="">
            <div class="card p-2 m-3 w-auto">                    
                <h4><?= $post->title ?></h4>
                <span><?= $post->formatDate($post->date)?></span> <!-- method della class Posts "formatDate($date)"-->
                <span><?= $post->medias->type ?></span>

                <div class="d-flex">
                    <?php if ($post->medias->type === 'Photo') : ?> <!-- condizionale, se il tipo di media é una imagine usare il tag "<img>", -->
                        <img class="px-2" 
                            src=<?= $post->medias->path ?> 
                            alt="<?= $post->medias->getInfoMedia() ?>"> <!-- method della class Media "getInfoMedia()"-->
                        </img> 

                        <?php elseif ($post->medias->type === 'Video') : ?> <!-- condizionale, altrimente se é un video usare il tag "<video>"-->
                            <video class="px-2 w-25" 
                                src="<?= $post->medias->path ?>" 
                                alt="<?= $post->medias->getInfoMedia() ?>"> <!-- method della class Media "getInfoMedia()"-->
                            </video>                                 
                    <?php endif;?>
                </div>
                
                <div>TAGS: 
                    <?php foreach($post->getTags() as $tag) : ?> <!-- method della class Posts "getTags()"-->
                        <span> <?= '  ' . $tag . ' | '?> </span>
                    <?php endforeach; ?>
                </div>                          
            </div>
        </div> 
    <?php endforeach; ?>               
</div>