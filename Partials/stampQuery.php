
<div class="py-5 mx-auto mt-3">
    <hr class="border border-light">
    <h2 class="py-5 w-75 mt-3" style="color: #96b5b6; text-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);"> 
            Stampa 1 query del Database:
    </h2>

    <div class="mt-2 d-flex justify-content-between">
        <div class="card mx-2 h-50 p-3" style="background-color:#96b5b6; color: #172525; width: 55%;">
            <h5>Query SQL: Ordina gli utenti per il numero di media caricati</h5>
            <p class="p-3 border border-success border-3 rounded-4">
                <span class="text-danger">SELECT COUNT</span>(`medias`.`id`) <span class="text-danger">AS</span> `num_media`, `medias`.`user_id`, `users`.`username` <br>
                <span class="text-danger">FROM</span> `medias`<br>
                <span class="text-danger">JOIN</span> `users` <span class="text-danger">ON</span> `users`.`id` = `medias`.`user_id`<br>
                <span class="text-danger">GROUP BY</span> `user_id`<br>
                <span class="text-danger">ORDER BY</span> `num_media` <span class="text-danger">DESC</span>;<br>
            </p>
        </div>
        
        <table class="table table-striped p-3 table-success table-hover" style="width: 40%;" >
            <thead >
                <tr class="p-3">
                    <th scope="col" style="background-color:#96b5b6; color: #172525; width: calc(100% / 30) * 1;">
                        User Id
                    </th>
                    <th scope="col" style="background-color:#96b5b6; color: #172525; width: calc(100% / 30) * 1;">
                        User Name
                    </th>
                    <th class="text-center text-wrap" scope="col" style="background-color:#96b5b6; color: #172525; width: calc(100% / 30) * 1;">
                        Media Caricate
                    </th>
                </tr>
            </thead>
            <tbody >
                <?php while ($row = $result->fetch_assoc() ) :
                ['user_id' => $user_id, 'username' => $username, 'num_media' => $num_media ] = $row; ?> 
                    <tr class="p-3">
                        <th class="text-start" scope="row" style="background-color:#96b5b6; color: #172525;">
                            <?= $user_id ?>
                        </th>
                        <td style="background-color:#96b5b6; color: #172525;">
                            <?= $username ?>
                        </td>
                        <td class="text-center" style="background-color:#96b5b6; color: #172525;">
                            <?= $num_media ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>           
    </div>
</div> 