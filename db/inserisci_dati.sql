INSERT INTO `squadra` (`nome`, `logo`) VALUES
('Atalanta', 'atalanta.png'),
('Bologna', 'bologna.png'),
('Cremonese', 'cremonese.png'),
('Empoli', 'empoli.png'),
('Fiorentina', 'fiorentina.png'),
('Hellas', 'hellas.png'),
('Inter', 'inter.png'),
('Juventus', 'juventus.png'),
('Lazio', 'lazio.png'),
('Lecce', 'lecce.png'),
('Milan', 'milan.png'),
('Monza', 'monza.png'),
('Napoli', 'napoli.png'),
('Roma', 'roma.png'),
('Salernitana', 'salernitana.png'),
('Sampdoria', 'sampdoria.png'),
('Sassuolo', 'sassuolo.png'),
('Spezia', 'spezia.png'),
('Torino', 'torino.png'),
('Udinese', 'udinese.png');

INSERT INTO `riguarda` (`squadra`, `id_post`) VALUES
('Milan', 1);

INSERT INTO `utente` (`nome`, `cognome`, `psw`, `email`, `immagine`, `n_follower`, `n_seguiti`, `nickname`) VALUES
('Marsild', 'Spahiu', '12345678', 'marsildspahiu@gmail.com', 'test', 0, 0, 'marsild');

INSERT INTO `post` (`id`, `immagine`, `testo`, `n_like`, `n_commenti`, `data_post`, `nickname`) VALUES
(1, 'test', 'Primo post', 0, 0, '2022-12-29', 'marsild');

ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
