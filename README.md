# MonitorXpert

Monitoringsdashboard voor **EcoPower Systems**. Met MonitorXpert volgen medewerkers de energieproductie van de centrales en handelen ze storingen, klantmeldingen, onderhoud en rapportages af.

Schoolproject E2 Ontwerpen – Curio, Software Developer niveau 4 – Rowan de Bont.

## Techniek

| Onderdeel | Versie |
|---|---|
| PHP | 8.4 (minimaal 8.3) |
| Laravel | 13.x |
| Livewire | 4.x |
| MySQL | 8.4 LTS |
| Lokale server | Laragon 8.7 (Apache 2.4, phpMyAdmin) |
| Composer | 2.x |
| Node.js + npm | 24 LTS (Vite) |

## Project lokaal opzetten

1. Clone de repository in `C:\laragon\www`:
```bash
   git clone https://github.com/RDeBont/monitor-xpert.git
   cd monitor-xpert
```
2. Installeer de packages:
```bash
   composer install
   npm install
```
3. Maak het `.env`-bestand en een app key:
```bash
   copy .env.example .env
   php artisan key:generate
```
4. Maak de database aan (Laragon → Start All):
```bash
   mysql -u root -e "CREATE DATABASE monitor_xpert CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```
5. Tabellen en testdata aanmaken:
```bash
   php artisan migrate:fresh --seed
```
6. Frontend starten en openen:
```bash
   npm run dev
```
   Open daarna http://monitor-xpert.test (in Laragon eventueel op *Reload* klikken).

## Testaccounts

Wachtwoord voor alle accounts: `Welkom123!`

| Naam | E-mailadres | Rol |
|---|---|---|
| Piet Jansen | piet.technicus@ecopower.test | technicus |
| Sanne de Wit | sanne.technicus@ecopower.test | technicus |
| Olga Bakker | olga.manager@ecopower.test | operationeel_manager |
| Karin Visser | karin.service@ecopower.test | klantenservice |
| Erik Mulder | erik.ceo@ecopower.test | executief_manager |
| John Doe | john.doe@example.com | klant (12345) |
| Jane Smith | jane.smith@example.com | klant (67890) |

## Database

De database volgt het ERD in `docs/ERD_MonitorXpert.png` (19 tabellen).

| Onderdeel | Tabellen |
|---|---|
| Gebruikers | `roles`, `users` |
| Centrales | `locaties`, `centrales`, `grenswaarden`, `metingen`, `documenten` |
| Storingen | `storingen`, `storing_technici`, `storing_updates`, `inkomende_mails` |
| Klanten | `klanten`, `contracten`, `klantmeldingen`, `klantmelding_berichten` |
| Onderhoud & rapportage | `onderhoudstaken`, `rapporten`, `rapport_gedeeld`, `meldingen` |

Afspraken:
- Tabelnamen zijn Nederlands, daarom heeft elk model een `$table`.
- `users` gebruikt `name` en `password` omdat Laravel-authenticatie die kolommen verwacht.
- Alleen `users` heeft `created_at`/`updated_at`. Tabellen met `aangemaakt_op` vullen die datum automatisch via `CREATED_AT`.

Vaste waardes (ENUM):

| Kolom | Waardes |
|---|---|
| `storingen.status`, `klantmeldingen.status` | gemeld, in_behandeling, gepland, uitgevoerd, in_afwachting, opgelost |
| `storingen.urgentie` | laag, normaal, hoog, urgent |
| `storingen.type` | stroom, machine, temperatuur, overig |
| `storingen.grootte` | klein, gemiddeld, groot |
| `storingen.bron` | technicus, klant, email, sensor |
| `onderhoudstaken.status` | gepland, in_behandeling, afgerond, geannuleerd |
| `centrales.status` | actief, storing, onderhoud, buiten_gebruik |

## Ontwerpen

Alle ontwerpdocumenten staan in de map `docs/`:

- User Stories (18 stories met acceptatiecriteria)
- Testplan (per user story een use case met 5 tests en testdata)
- ERD
- Activiteitendiagrammen
- Ontwikkelomgeving

## Takenbord

De taken staan in het GitHub-project **MonitorXpert takenbord** (tab *Projects*), verdeeld over 5 sprints (milestones):

0. Fundament – setup, migrations, models, seeders, README
1. Inloggen en beheer
2. Storingen
3. Monitoring en onderhoud
4. Klanten en rapportage

Begin bij de eerste open issue in de laagste sprint. Elke issue heeft acceptatiecriteria als checklist; de bijbehorende tests staan in het Testplan.

## Werkafspraken

- Commit messages in het Engels volgens *Conventional Commits* (`feat:`, `fix:`, `docs:`, `chore:`).
- Eén issue per branch: `feature/TE-02-storing-melden`.
- Sluit een issue pas als alle acceptatiecriteria en tests uit het Testplan slagen.