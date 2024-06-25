<?php


require_once('Constantes.php');
//----------------------------------------------------------------------------
//--- dbConnect --------------------------------------------------------------
//----------------------------------------------------------------------------
// Create the connection to the database.
// \return False on error and the database otherwise.
function dbConnect()
{
    try {
        $db = new PDO('pgsql:host=' . DB_SERVER . ';port=' . DB_PORT . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exception) {
        error_log('Connection error: ' . $exception->getMessage());
        return false;
    }
    return $db;
}

//----------------------------------------------------------------------------
//--- dbRequestPolls ---------------------------------------------------------
//----------------------------------------------------------------------------
// Function to get the polls.
// \param db The connected database.
// \return The list of polls titles.
function dbRequestArbres($db)
{
    try {
        $request = 'SELECT a.longitude, a.latitude, a.haut_tot, a.haut_tronc, a.tronc_diam, a.clc_nbr_diag, a.remarquable, a.revetement, a.date_ajout , ae.nom_arbreetat, f.nom_feuillage, nt.nomtech, pi.nom_pied, po.nom_port, q.nom_quartier, se.nom_secteur, si.nom_situation, sd.nom_stadedev, vc.nom_villeca
        FROM Arbre a
        JOIN ArbreEtat ae ON a.id_arbreetat = ae.id_arbreetat
        JOIN Feuillage f ON a.id_feuillage = f.id_feuillage
        JOIN Nomtech nt ON a.id_nomtech = nt.id_nomtech
        JOIN Pied pi ON a.id_pied = pi.id_pied
        JOIN Port po ON a.id_port = po.id_port
        JOIN Quartier q ON a.id_quartier = q.id_quartier
        JOIN Secteur se ON a.id_secteur = se.id_secteur
        JOIN Situation si ON a.id_situation = si.id_situation
        JOIN Stadedev sd ON a.id_stadedev = sd.id_stadedev
        JOIN Villeca vc ON a.id_villeca = vc.id_villeca
        ';

        $statement = $db->prepare($request);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $exception) {
        error_log('Request error: ' . $exception->getMessage());
        return false;
    }
    return $result;
}