import pandas as pd

#ouverture du csv
data = pd.read_csv('csv/Data_Arbre.csv')

print(data.columns)

#à partir de mon csv, crée un script sql qui va remplir les tableau de ma database
#parcourt le tableau data ligne par ligne
#pour chaque ligne, on ajoute les valeurs des colonnes dans les tableaux correspondants
#on évite les doublons dans les tableaux
#on crée un fichier sql qui contient les requêtes d'insertion
#on exécute ce fichier sql sur la base de données

#on crée un fichier sql
f = open("remplissage.sql", "w")

#on crée une liste de tableaux
list_colonnes = ['clc_quartier', 'clc_secteur', 'fk_arb_etat', 'fk_stadedev', 'fk_port',
       'fk_pied', 'fk_situation', 'fk_nomtech', 'villeca', 'feuillage']
tableaux = {col: [] for col in list_colonnes}

print(tableaux)
#on parcourt les lignes du tableau
for i in range(len(data)):
    #on parcourt les colonnes du tableau
    for col in data.columns:
        if col in tableaux.keys():
            #on récupère la valeur de la colonne
            value = data[col][i]
            #si la valeur n'est pas déjà dans le tableau, on l'ajoute
            if value not in tableaux[col]:
                tableaux[col].append(value)

print(tableaux)




       