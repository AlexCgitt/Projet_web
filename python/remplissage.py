import pandas as pd

data = pd.read_csv('csv/Data_Arbre.csv')

print(data.columns)



#Récupère toutes les valeurs possibles pour les colonnes clc_quartier, clc_secteur, fk_arb_etat, fk_stadedev, fk_port, fk_pied, fk_situation, fk_revetement, fk_nomtech, villeca, feuillage
quartier = data['clc_quartier'].unique()
secteur = data['clc_secteur'].unique()
etat = data['fk_arb_etat'].unique()
stade = data['fk_stadedev'].unique()
port = data['fk_port'].unique()
pied = data['fk_pied'].unique()
situation = data['fk_situation'].unique()
revetement = data['fk_revetement'].unique()
nomtech = data['fk_nomtech'].unique()
villeca = data['villeca'].unique()
feuillage = data['feuillage'].unique()

#Remplissage des colonnes clc_quartier, clc_secteur, fk_arb_etat, fk_stadedev, fk_port, fk_pied, fk_situation, fk_revetement, fk_nomtech, villeca, feuillage

       