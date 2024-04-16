<div class="card container py-4 w-50 m-auto" style="background-color:#96b5b6; color: #172525;">
    <h2>Stampa 1 query del Database:</h2>
    <span># 4. Ordina gli utenti per il numero di media caricati</span>
    <table class="table w-100" style="background-color:#96b5b6; color: #172525;" >
        <thead >
            <tr>
                <th scope="col" style="background-color:#96b5b6; color: #172525;">
                    User Id
                </th>
                <th scope="col" style="background-color:#96b5b6; color: #172525;">
                    Likes
                </th>
            </tr>
        </thead>
        <tbody >
            <?php while ($row = $result->fetch_assoc() ) :
            ['user_id' => $user_id, 'num_likes' => $num_likes ] = $row; ?> 
                <tr>
                    <th scope="row" style="background-color:#96b5b6; color: #172525;">
                        <?= $user_id ?>
                    </th>
                    <td style="background-color:#96b5b6; color: #172525;">
                        <?= $num_likes ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>           
</div> 