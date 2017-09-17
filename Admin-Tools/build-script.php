<?php
	include('../Helpers/connectToDatabase.php');

	// Perform queries 
	mysqli_query($con,"DROP TABLE IF EXISTS users;");
	mysqli_query($con,"DROP TABLE IF EXISTS userVideoGames;");
	mysqli_query($con,"DROP TABLE IF EXISTS videoGames;");
	mysqli_query($con,"DROP TABLE IF EXISTS videoGameMarkers;");
	mysqli_query($con,"DROP TABLE IF EXISTS assets;");
	mysqli_query($con,"DROP TABLE IF EXISTS userMaps;");
	mysqli_query($con,"DROP TABLE IF EXISTS mapMarkers;");
	
	mysqli_query($con,"CREATE TABLE users(
		userId SERIAL PRIMARY KEY,
		firstName varchar(100),
		lastName varchar(100),
		username varchar(100),
		email varchar(500),
		password varchar(500)
	);");

	mysqli_query($con,"CREATE TABLE userVideoGames(
		userVideoGameId SERIAL PRIMARY KEY,
		userId integer,
		videoGameId integer
	);");
	mysqli_query($con,"CREATE TABLE videoGames(
		videoGameId SERIAL PRIMARY KEY,
		name varchar(500),
		coverPath varchar(100),
		mapPath varchar(100)
	);");
	mysqli_query($con,"CREATE TABLE videoGameMarkers(
		videoGameMarkerId SERIAL PRIMARY KEY,
		videoGameId integer,
		x double precision,
		y double precision,
		userId integer,
		score double precision,
		status varchar(100),
		title varchar(500),
		body varchar(100),
		mapId integer,
		assetId integer
	);");
	mysqli_query($con,"CREATE TABLE assets(
		assetId SERIAL PRIMARY KEY,
		filepath varchar(500),
		description varchar(500),
		type varchar(500)
	);");

	mysqli_query($con,"CREATE TABLE userMaps(
		mapId SERIAL PRIMARY KEY,
		videoGameId integer,
		userId integer,
		dateAdded date
	);");

	mysqli_query($con,
		"INSERT INTO users(
			firstName, lastName, username, email, password
		)
		VALUES 
		('Luke', 'Masters', 'luke', 'lsm5fm@virginia.edu', '123'), 
		('James', 'Mekavibul', 'james', 'jmk@virginia.edu', 'meka');
	");

	mysqli_query($con,
	"INSERT INTO videoGames(
		name, coverPath, mapPath
	)
	VALUES 
	('Skyrim', 'skyrim.png', 'skyrim.jpg'),
	('Breath of the Wild', 'breathofthewild.png', 'breathofthewild.jpg'),
	('Nier Automata', 'nierautomata.png', 'nierautomata.jpg'),
	('Grand Theft Auto V', 'gtav.png', 'gtav.jpg'),
	('Xenoblade Chronicles X', 'xenobladechroniclesx.png', 'xenobladechroniclesx.jpg');
	
	");

	mysqli_close($con);
?>