# **Nicomak**
This project is for [Nicomak](https://www.nicomak.eu/) so that employees can thank each other.

## *How to setup*
---
1. First you will have to clone this project and go to the directory
```
git clone https://github.com/Zen-kun04/Nicomak.git
cd Nicomak
```

2. Next you will have to rename `.env.dist` to `.env` and modify everything you need (like the database)
```
mv .env.dist .env
nano .env
```

3. Then you will just have to run the project (localhost:8000 by default)
```
symfony serve
```

## *TODO List*
---
- [x] Create project
- [x] Create User/Employee entity
- [x] Create Fixtures
- [x] Create Thanks entity
- [x] Create Index controller
- [x] Create Thanks list controller
- [x] Create Edition controller
- [x] Create Deletion controller
- [x] Create login
- [x] Create register
- [x] Add header
- [ ] Add styles
- [ ] Make the web app responsive
- [ ] Create thanks (be able to thank an employee)
- [x] Add the edition functionnality
- [x] Add the deletion functionnality
- [ ] Add avatars to Users/Employees
- [ ] Add filters
---