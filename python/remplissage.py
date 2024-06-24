import pandas as pd

# Lire le fichier CSV
file_path = '/mnt/data/csv/DataArbre.csv'
data = pd.read_csv(file_path)

# Extraire les données nécessaires pour chaque table
quartiers = data[['id_quartier', 'nom_quartier']].drop_duplicates()
secteurs = data[['id_secteur', 'nom_secteur', 'id_quartier']].drop_duplicates()
stadedevs = data[['id_stadedev', 'nom_stadedev']].drop_duplicates()
nomtechs = data[['id_nomtech', 'nomtech']].drop_duplicates()
ports = data[['id_port', 'nom_port']].drop_duplicates()
villecas = data[['id_villeca', 'nom_villeca']].drop_duplicates()
pieds = data[['id_pied', 'nom_pied']].drop_duplicates()
feuillages = data[['id_feuillage', 'nom_feuillage']].drop_duplicates()
situations = data[['id_situation', 'nom_situation']].drop_duplicates()
arbreetats = data[['id_arbreetat', 'nom_arbreetat']].drop_duplicates()
arbres = data[['id_arbre', 'longitude', 'latitude', 'haut_tot', 'haut_tronc', 'tronc_diam', 'age_estim', 'clc_nbr_diag', 'remarquable', 'revetement', 'date_ajout', 'id_stadedev', 'identifiant', 'id_nomtech', 'id_port', 'id_villeca', 'id_pied', 'id_feuillage', 'id_situation', 'id_arbreetat', 'id_secteur']]

# Générer les commandes SQL
sql_commands = []

def generate_insert(table_name, data_frame, columns):
    commands = []
    for _, row in data_frame.iterrows():
        values = ', '.join([f"'{str(value)}'" if isinstance(value, str) else str(value) for value in row])
        command = f"INSERT INTO {table_name} ({', '.join(columns)}) VALUES ({values});"
        commands.append(command)
    return commands

# Quartier
sql_commands.extend(generate_insert('Quartier', quartiers, ['id_quartier', 'nom_quartier']))

# Secteur
sql_commands.extend(generate_insert('Secteur', secteurs, ['id_secteur', 'nom_secteur', 'id_quartier']))

# Les autres tables
sql_commands.extend(generate_insert('Stadedev', stadedevs, ['id_stadedev', 'nom_stadedev']))
sql_commands.extend(generate_insert('Nomtech', nomtechs, ['id_nomtech', 'nomtech']))
sql_commands.extend(generate_insert('Port', ports, ['id_port', 'nom_port']))
sql_commands.extend(generate_insert('Villeca', villecas, ['id_villeca', 'nom_villeca']))
sql_commands.extend(generate_insert('Pied', pieds, ['id_pied', 'nom_pied']))
sql_commands.extend(generate_insert('Feuillage', feuillages, ['id_feuillage', 'nom_feuillage']))
sql_commands.extend(generate_insert('Situation', situations, ['id_situation', 'nom_situation']))
sql_commands.extend(generate_insert('ArbreEtat', arbreetats, ['id_arbreetat', 'nom_arbreetat']))

# Arbre
sql_commands.extend(generate_insert('Arbre', arbres, ['id_arbre', 'longitude', 'latitude', 'haut_tot', 'haut_tronc', 'tronc_diam', 'age_estim', 'clc_nbr_diag', 'remarquable', 'revetement', 'date_ajout', 'id_stadedev', 'identifiant', 'id_nomtech', 'id_port', 'id_villeca', 'id_pied', 'id_feuillage', 'id_situation', 'id_arbreetat', 'id_secteur']))

# Écrire les commandes SQL dans un fichier
output_file_path = '/mnt/data/sql/insert_data.sql'
with open(output_file_path, 'w') as file:
    for command in sql_commands:
        file.write(command + '\n')

output_file_path