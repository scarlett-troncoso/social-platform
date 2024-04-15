<div class="container py-4 w-75">
    <h2>Stampa 1 query del Database:</h2>
    <span># 4. Ordina gli utenti per il numero di media caricati</span>
    <table class="table w-25">
        <thead>
            <tr>
                <th scope="col">User Id</th>
                <th scope="col">Likes</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc() ) :
            ['user_id' => $user_id, 'num_likes' => $num_likes ] = $row; ?> 
                <tr>
                    <th scope="row"><?= $user_id ?></th>
                    <td><?= $num_likes ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>           
</div> 