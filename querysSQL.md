## 1. Seleziona gli utenti che hanno postato almeno un video (869)

--- sql
SELECT `users`.`id`, `users`.`username`, `posts`.`title` AS `posts_title`, `medias`.`type`, `posts`.`date` AS `posts_date`
FROM `users`
JOIN `posts` ON `posts`.`user_id` = `users`.`id`
JOIN `medias` ON `medias`.`user_id` = `users`.`id`
WHERE `medias`.`type` = 'video';

## 2. Seleziona tutti i post senza Like (13)

--- sql
SELECT `id` AS `id_post_no_likes`
FROM `posts`
WHERE NOT EXISTS (SELECT `post_id` FROM `likes` WHERE `likes`.`post_id` = `posts`.`id`);

## 3. Conta il numero di like per ogni post (165)

--- sql
SELECT COUNT(`likes`.`user_id`) AS `num_likes`, `posts`.`id` AS `post_id`
FROM `posts`
LEFT JOIN `likes` ON `likes`.`post_id` = `posts`.`id`
GROUP BY `posts`.`id`;

## 4. Ordina gli utenti per il numero di media caricati (25)

--- sql
SELECT COUNT(`medias`.`id`) AS `num_media`, `medias`.`user_id`, `users`.`username`
FROM `medias`
JOIN `users` ON `users`.`id` = `medias`.`user_id` //Per avere anche i nomi degli utenti
GROUP BY `user_id`
ORDER BY `num_media` DESC;

## 5. Ordina gli utenti per totale di likes ricevuti nei loro posts (25)

--- sql
SELECT `posts`.`user_id`, COUNT(`likes`.`user_id`) AS `num_likes`
FROM `posts`
JOIN `likes` ON `likes`.`post_id` = `posts`.`id`
GROUP BY `posts`.`user_id`
ORDER BY `num_likes` DESC;
