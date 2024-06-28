import pandas as pd
from sklearn.cluster import KMeans
import mysql.connector
import plotly.express as px
import plotly.io as pio
import matplotlib.pyplot as plt

# by emir
# Connexion à la base de données MySQL
conn = mysql.connector.connect(
    host="localhost",
    user="etu1105",
    password="jhwuqqax",
    database="etu1105"
)

# Sélection les colonnes pertinentes pour le clustering KMeans avec une requête MySQL
query = "SELECT haut_tot, haut_tronc, tronc_diam, latitude, longitude FROM Arbre"
data = pd.read_sql(query, conn)
col_data = data[['haut_tot', 'haut_tronc', 'tronc_diam']]
kmeans = KMeans(n_clusters=5, random_state=42)
data['cluster'] = kmeans.fit_predict(col_data)

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
# print(stats, "\n", data['category'].value_counts())

# Affichage de la carte par rapport à leur cluster
fig = px.scatter_mapbox(data, lat="latitude", lon="longitude", color="cluster", zoom=12)
fig.update_layout(mapbox_style="open-street-map")
fig.update_layout(margin={"r":0,"t":0,"l":0,"b":0})
pio.write_html(fig, file='carte_plotly.html', auto_open=False)

conn.close()