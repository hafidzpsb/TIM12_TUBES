## API Manajemen Poliklinik

## Instalasi

#### 1. Pull repository
#### 2. Migrate database
```bash
  php artisan migrate:fresh
```
#### 3. Seed database
```bash
  php artisan db:seed
```

## Endpoint

#### Contoh

```http
http://127.0.0.1:8000/api/poliklinik/pasien
```

| Parameter                 | Method   | Description                |
| :--------                 | :------- | :------------------------- |
| `/pasien`                 | `GET`    | index |
| `/pasien`                 | `POST`   | store |
| `/pasien/{id_pasien}`     | `GET`    | show |
| `/pasien/{id_pasien}`     | `PUT`    | update |
| `/pasien/{id_pasien}`     | `DELETE` | delete |
| `/rm`                     | `GET`    | index |
| `/rm`                     | `POST`   | store |
| `/rm/{id_rm}`             | `GET`    | show |
| `/rm/{id_rm}`             | `PUT`    | update |
| `/rm/{id_rm}`             | `DELETE` | delete |
| `/konsul`                 | `GET`    | index |
| `/konsul`                 | `POST`   | store |
| `/konsul/{id_konsul}`     | `GET`    | show |
| `/konsul/{id_konsul}`     | `PUT`    | update |
| `/konsul/{id_konsul}`     | `DELETE` | delete |
| `/resep`                  | `GET`    | index |
| `/resep`                  | `POST`   | store |
| `/resep/{id_resep}`       | `GET`    | show |
| `/resep/{id_resep}`       | `PUT`    | update |
| `/resep/{id_resep}`       | `DELETE` | delete |
| `/rujuk`                  | `GET`    | index |
| `/rujuk`                  | `POST`   | store |
| `/rujuk/{id_rujuk}`       | `GET`    | show |
| `/rujuk/{id_rujuk}`       | `PUT`    | update |
| `/rujuk/{id_rujuk}`       | `DELETE` | delete |
| `/operasi`                | `GET`    | index |
| `/operasi`                | `POST`   | store |
| `/operasi/{id_operasi}`   | `GET`    | show |
| `/operasi/{id_operasi}`   | `PUT`    | update |
| `/operasi/{id_operasi}`   | `DELETE` | delete |