INSERT INTO `utente` (`nome`, `cognome`, `psw`, `email`, `immagine`, `n_follower`, `n_seguiti`, `nickname`) VALUES
('Marsild', 'Spahiu', '12345678', 'marsildspahiu@gmail.com', 'test', 0, 0, 'marsild'),;

INSERT INTO `post` (`id`, `immagine`, `testo`, `n_like`, `n_commenti`, `data_post`, `nickname`) VALUES
(1, 'test', 'Primo post', 0, 0, '2022-12-29', 'marsild');

ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
