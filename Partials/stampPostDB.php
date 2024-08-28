 
<div class="py-5 mx-auto mt-3">
    <hr class="border border-light">
    <h2 class="py-5 w-75 mt-3" style="color: #96b5b6; text-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);"> 
        Stampa 3 Posts stanziati con dati del Database:
    </h2>
    <div  class="row d-flex ">
        <?php foreach($posts_db as $post) : ?>
            <div  class="col-4" >
                <div class="card p-2 my-3 shadow" style="background-color:#96b5b6; color: #172525;">                    
                    <h4><?= $post->title ?></h4>
                    <span><?= $post->formatDate($post->date)?></span> <!-- method della class Posts "formatDate($date)"-->

                    <div class="w-100 h-100 ">
                    <?php foreach($post->medias->type as $index => $type) : ?> <!-- Itera su ogni tipo di media -->
                            <?php 
                                $path = $post->medias->path[$index]; // Ottieni il percorso corrispondente al tipo
                                $defaultImage = "https://picsum.photos/600/400"; // Immagine di fallback da Picsum
                            ?>

                            <?php if ($type === 'photo') : ?> <!-- Se il tipo di media è una immagine, usa il tag "<img>" -->
                                <img class="w-100 shadow-sm my-1 bg-success" 
                                    src="<?= file_exists($path) ? $path : $defaultImage ?>" 
                                    alt="<?= $type . ' link: ' . $path ?>"> <!-- Stampa il tipo e il percorso --> <!-- Se il file esiste usa il path, altrimenti usa limmagine di fallback -->
                                </img>

                            <?php elseif ($type === 'video') : ?> <!-- Se è un video, usa il tag "<video>" -->
                                <video class="w-100 shadow-sm my-1 bg-success" 
                                    src="<?= $path ?>" 
                                    alt="<?= $type . ' link: ' . $path ?>" 
                                    controls> <!-- Stampa il tipo e il percorso -->
                                </video>
                            <?php endif; ?>
                        <?php endforeach; ?>                         
                    </div>
                    
                    <div>Tags: 
                    
                    <?php $post->tags; // Stringa JSON
                            $tags = json_decode($post->tags, true); // Converte la stringa JSON in un array ?>
                        <?php foreach($tags as $tag) : ?> <!-- method della class Posts "getTags()"-->
                            <span> <?= '  ' . $tag . ' | '?> </span>
                        <?php endforeach; ?>
                    </div>                         
                </div>
            </div>                         
        <?php endforeach; ?>     
          
    </div>     
</div>

