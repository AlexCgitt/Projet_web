import pandas as pd
from sklearn.cluster import KMeans
import mysql.connector

# by emir
# Connexion à la base de données MySQL
conn = mysql.connector.connect(
    host="localhost",
    user="etu1105",
    password="jhwuqqax",
    database="etu1105"
)

# Sélection les colonnes pertinentes pour le clustering KMeans avec une requête MySQL
query = "SELECT haut_tot, haut_tronc, tronc_diam FROM Arbre"
data = pd.read_sql(query, conn)
col_data = data[['haut_tot', 'haut_tronc', 'tronc_diam']]
kmeans = KMeans(n_clusters=5, random_state=42)
data['cluster'] = kmeans.fit_predict(col_data)

last_tree = "SELECT haut_tot, haut_tronc, tronc_diam FROM Arbre ORDER BY id_arbre DESC"
data_last = pd.read_sql(last_tree, conn)
print(data_last.iloc[0])


# Fonction qui catégorise les arbres selon leur cluster
def categorize(row, stats):
    if row['cluster'] == stats.loc[2, 'cluster']:
        return 'petit'
    elif row['cluster'] == stats.loc[0, 'cluster']:
        return 'petit'
    elif row['cluster'] == stats.loc[3, 'cluster']:
        return 'moyen'
    elif row['cluster'] == stats.loc[1, 'cluster']:
        return 'grand'
    elif row['cluster'] == stats.loc[4, 'cluster']:
        return 'grand'
    else:
        return 'inconnu'

# Déterminer les catégories (petit, moyen, grand)
stats = data.groupby('cluster')[['haut_tot', 'haut_tronc', 'tronc_diam']].mean().reset_index()
data['category'] = data.apply(lambda row: categorize(row, stats), axis=1)
#print(stats, "\n", data['category'].value_counts())

# Fonction qui détermine le cluster de l'arbre ajouté
def new_tree(tree):
    tree_df = pd.DataFrame([tree], columns=['haut_tot', 'haut_tronc', 'tronc_diam'])
    new_cluster = kmeans.predict(tree_df)[0]
    new_category = categorize(pd.Series({'cluster': new_cluster}), stats)
    return new_cluster, new_category

# Calcul du Cluster du dernier arbre
tree = data_last.iloc[0]
cluster, category = new_tree(tree)
print(f"Le nouvel arbre appartient au cluster {cluster} et est catégorisé comme {category}.")

conn.close()