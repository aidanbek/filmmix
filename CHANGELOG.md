# Release Notes

## [0.10.4 (2021-11-13)](https://github.com/aidanbek/filmmix/compare/0.10.3...0.10.4)

### Added
- DB seeders for users

### Refactored
- Source data moved from DB seeder to json files 

## [0.10.3 (2021-11-11)](https://github.com/aidanbek/filmmix/compare/0.10.2...0.10.3)

### Added
- DB seeders for countries

### Changed
- Update seeders
- Remove "code" field from Country

## [0.10.2 (2021-11-10)](https://github.com/aidanbek/filmmix/compare/0.10.1...0.10.2)

### Added
- Plural title for profession

## [0.10.1 (2021-11-10)](https://github.com/aidanbek/filmmix/compare/0.10.0...0.10.1)

### Changed
- Rename 'FilmCountry' to 'FilmOriginCountry'
- Changed film page

## [0.10.0 (2021-10-24)](https://github.com/aidanbek/filmmix/compare/0.9.2...0.10.0)

### Changed
- Upgrade using php version up to 8.x in composer.json
- Update composer dependencies

## [0.9.2 (2021-10-24)](https://github.com/aidanbek/filmmix/compare/0.9.1...0.9.2)

### Added
- DB seeder for professions and genres

## [0.9.1 (2021-10-23)](https://github.com/aidanbek/filmmix/compare/0.9.0...0.9.1)

### Fixed
- Rename the table "film_countries" to "film_origin_countries"

## [0.9.0 (2021-09-06)](https://github.com/aidanbek/filmmix/compare/0.8.0...0.9.0)

### Added
- Taglines to film

### Refactor
- Add phpDoc to blade views
- Add ordering to relations

## [0.8.0 (2021-09-04)](https://github.com/aidanbek/filmmix/compare/0.7.0...0.8.0)

### Refactor
- Reduce duplicated components

### Fixed
- Typo in some rules

## [0.7.0 (2021-09-04)](https://github.com/aidanbek/filmmix/compare/0.6.0...0.7.0)

### Refactor
- Reduce duplicated components
- Refactor model deleting
- Add views for editing models

## [0.6.0 (2021-09-04)](https://github.com/aidanbek/filmmix/compare/0.5.0...0.6.0)

### Refactor
- Delete modals made from template 

### Added
- Professions to users
- Partially add route model bindings

## [0.5.0 (2021-09-04)](https://github.com/aidanbek/filmmix/compare/0.4.1...0.5.0)

### Changed
- Remove actors, directors
- Pretty routes

### Added
- Profession

## [0.4.1 (2021-09-03)](https://github.com/aidanbek/filmmix/compare/0.4.0...0.4.1)

### Refactoring
- Group link templates to folder

## [0.4.0 (2021-09-03)](https://github.com/aidanbek/filmmix/compare/0.3.0...0.4.0)

### Added
- Added countries for users and films

## [0.3.0 (2021-09-03)](https://github.com/aidanbek/filmmix/compare/0.2.2...0.3.0)

### Added
- Created and update info to pages

## [0.2.2 (2021-09-02)](https://github.com/aidanbek/filmmix/compare/0.2.1...0.2.2)

### Refactoring
- Improve views, query reduce

## [0.2.1 (2021-08-30)](https://github.com/aidanbek/filmmix/compare/0.2.0...0.2.1)

### Changed
- Generate new meta and ide helper files
- Generate phpDoc for models

## [0.2.0 (2021-08-30)](https://github.com/aidanbek/filmmix/compare/0.1.3...0.2.0)

### Changed
- Update composer.lock and package-lock.json

## [0.1.3 (2021-08-30)](https://github.com/aidanbek/filmmix/compare/0.1.2...0.1.3)

### Refactoring
- Add validation rules
- Improve requests validation

## [0.1.2 (2021-08-30)](https://github.com/aidanbek/filmmix/compare/0.1.1...0.1.2)

### Refactoring
- Refactoring requests validation

## [0.1.1 (2021-08-30)](https://github.com/aidanbek/filmmix/compare/0.1.0...0.1.1)

### Refactoring
- Replace mass assignment/updating with single

## 0.1.0 (2021-08-30)

### Added
- Add Laravel Debugbar
- Add default redirect

### Changed
- Update README.md
- Some changes in .env.example
- Refactor some models
- Remove duplicated queries in ViewServiceProvider
- Remove hardcoded app name in default layout
