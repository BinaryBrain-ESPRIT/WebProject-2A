<?php
include '../config.php';
include_once '../Model/cars.php';
class AdherentC
{
	function affichercars()
	{
		$sql = "SELECT * FROM adherent";
		$db = config::getConnection();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMeesage());
		}
	}
	function supprimercars($NumAdherent)
	{
		$sql = "DELETE FROM adherent WHERE NumAdherent=:NumAdherent";
		$db = config::getConnection();
		$req = $db->prepare($sql);
		$req->bindValue(':NumAdherent', $NumAdherent);
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMeesage());
		}
	}
	function ajouteradherent($adherent)
	{
		$sql = "INSERT INTO adherent (NumAdherent, Nom, Prenom, Adresse, Email, DateInscription) 
			VALUES (:NumAdherent,:Nom,:Prenom, :Adresse,:Email, :DateInscription)";
		$db = config::getConnection();
		try {
			$query = $db->prepare($sql);
			$query->execute([
				'NumAdherent' => $adherent->getNumadherent(),
				'Nom' => $adherent->getNom(),
				'Prenom' => $adherent->getPrenom(),
				'Adresse' => $adherent->getAdresse(),
				'Email' => $adherent->getEmail(),
				'DateInscription' => $adherent->getDateinscription()
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}
	function recupereradherent($NumAdherent)
	{
		$sql = "SELECT * from adherent where NumAdherent=$NumAdherent";
		$db = config::getConnection();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$adherent = $query->fetch();
			return $adherent;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function modifieradherent($adherent, $numadherent)
	{
		try {
			$db = config::getConnection();
			$query = $db->prepare(
				'UPDATE adherent SET 
						Nom= :Nom, 
						Prenom= :Prenom, 
						Adresse= :Adresse, 
						Email= :Email, 
						DateInscription= :DateInscription
					WHERE NumAdherent= :NumAdherent'
			);
			$query->execute([
				'Nom' => $adherent->getNom(),
				'Prenom' => $adherent->getPrenom(),
				'Adresse' => $adherent->getAdresse(),
				'Email' => $adherent->getEmail(),
				'DateInscription' => $adherent->getDateinscription(),
				'NumAdherent' => $numadherent
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
}