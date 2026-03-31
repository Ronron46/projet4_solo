# projet 4
annuaire d'entreprise

# installation:

# backend

pour creer les images : 

```sh
docker compose build --pull --no-cache
```

pour lancer les containers :

```sh
docker compose up --wait
```

pour etteindre les containers :

```sh
docker compose down --remove-orphans
```

si le docker a été lancé pour la première fois, il faut effectuer ces deux commandes afin de créer les clés SSL pour la création des JWT :

```sh
docker exec -it phpapache bash
```
```sh
php bin/console lexik:jwt:generate-keypair
```