<div class="container py-4 w-75"> 
    <h2 class="w-75" style="color: #96b5b6; text-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);"> 
        Stampa 2 istanze Post
    </h2>
    <div  class="row d-flex ">
        <?php foreach($posts as $post) : ?>
            <div  class="col-4" >
                <div class=" card p-2 my-3 shadow" style="background-color:#96b5b6; color: #172525;">                    
                    <h4><?= $post->title ?></h4>
                    <span><?= $post->formatDate($post->date)?></span> <!-- method della class Posts "formatDate($date)"-->

                    <div class="w-100">
                        <?php foreach($post->medias->type as $index => $type) : ?> <!-- Itera su ogni tipo di media -->
                            <?php $path = $post->medias->path[$index]; ?> <!-- Ottieni il percorso corrispondente al tipo -->
                            
                            <?php if ($type === 'Photo') : ?> <!-- Se il tipo di media è una immagine, usa il tag "<img>" -->
                                <img class="w-100 shadow-sm" 
                                    src="<?= $path ?>" 
                                    alt="<?= $post->medias->getInfoMedia() ?>"> <!-- method della class Media "getInfoMedia()" -->
                                </img>

                            <?php elseif ($type === 'Video') : ?> <!-- Se è un video, usa il tag "<video>" -->
                                <video class="w-100 shadow-sm" 
                                    src="<?= $path ?>" 
                                    alt="<?= $post->medias->getInfoMedia() ?>" 
                                    controls> <!-- method della class Media "getInfoMedia()" -->
                                </video>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    
                    <div>Tags: 
                        <?php foreach($post->getTags() as $tag) : ?> <!-- method della class Posts "getTags()"-->
                            <span> <?= '  ' . $tag . ' | '?> </span>
                        <?php endforeach; ?>
                    </div>                          
                </div>
            </div>       
        <?php endforeach; ?>    

        <!--Stampa di media_extends-->
        <?php foreach($media_extends as $post) : ?>
            <div  class="col-4">
                <div class=" card p-2 my-3 shadow" style="background-color:#96b5b6">                    
                    <h4><?= $post->title ?></h4>
                    <span><?= $post->formatDate($post->date)?></span> <!-- method della class MediaExtend "formatDate($date)"-->

                    <div class="w-100">
                        
                        <?php foreach($post->type as $index => $type) : ?> <!-- Itera su ogni tipo di media -->
                        
                            <?php $path = $post->path[$index]; ?> <!-- Ottieni il percorso corrispondente al tipo -->
                            
                            <?php if ($type === 'Photo') : ?> <!-- Se il tipo di media è una immagine, usa il tag "<img>" -->
                                <img class="w-100 shadow-sm" 
                                    src="<?= $path ?>" 
                                    alt="<?= $post->getInfoMedia() ?>"> <!-- method della class Media "getInfoMedia()" -->
                                </img>

                            <?php elseif ($type === 'Video') : ?> <!-- Se è un video, usa il tag "<video>" -->
                                <video class="w-100 shadow-sm" 
                                    src="<?= $path ?>" 
                                    alt="<?= $post->getInfoMedia() ?>" 
                                    controls> <!-- method della class Media "getInfoMedia()" -->
                                </video>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    
                    <div>Tags: 
                        <?php foreach($post->tags as $tag) : ?> 
                            <span> <?= '  ' . $tag . ' | '?> </span>
                        <?php endforeach; ?>
                    </div>                          
                </div>
            </div>       
        <?php endforeach; ?>    
    </div>     
</div>

