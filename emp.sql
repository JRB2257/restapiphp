

CREATE TABLE `emp` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(256) NOT NULL,
  `confirm_password` varchar(256) NOT NULL
)


INSERT INTO `emp` (`id`, `email`, `phone`, `password`, `confirm_password`) VALUES
(1, 'jeevan@gmail.com', '1111111111', J*95^sk3, J*95^sk3),
(2, 'jeevan1@gmail.com', '2222222222', J*95^sk3, J*95^sk3),
(3, 'jeevan2@gmail.com', '3333333333', J*95^sk3, J*95^sk3),
(4, 'jeevan3@gmail.com', '4444444444', J*95^sk3, J*95^sk3);


ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

