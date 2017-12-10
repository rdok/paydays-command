## Paydays
Output pay dates for any given year. Options include different language, and 
output format.

### Uses
#### File

```bash
./paydays on 2017 -o file
  
Paydays saved to paydays_2017.csv
```

#### Standard output
```bash
./paydays on 2017
  
+------------+------------------+------------------+------------+
| Month Name | 1st expenses day | 2nd expenses day | Salary day |
+------------+------------------+------------------+------------+
| January    | 2017-01-02       | 2017-01-16       | 2017-01-31 |
| February   | 2017-02-01       | 2017-02-15       | 2017-02-28 |
| March      | 2017-03-01       | 2017-03-15       | 2017-03-31 |
| April      | 2017-04-03       | 2017-04-17       | 2017-04-28 |
| May        | 2017-05-01       | 2017-05-15       | 2017-05-31 |
| June       | 2017-06-01       | 2017-06-15       | 2017-06-30 |
| July       | 2017-07-03       | 2017-07-17       | 2017-07-31 |
| August     | 2017-08-01       | 2017-08-15       | 2017-08-31 |
| September  | 2017-09-01       | 2017-09-15       | 2017-09-29 |
| October    | 2017-10-02       | 2017-10-16       | 2017-10-31 |
| November   | 2017-11-01       | 2017-11-15       | 2017-11-30 |
| December   | 2017-12-01       | 2017-12-15       | 2017-12-29 |
+------------+------------------+------------------+------------+
```

#### Change Language
```bash
$ ./paydays on 2017 -l fr

+-------------+----------------------+-----------------------+-----------------+
| Nom du mois | 1er jour de dépenses | 2ème jour de dépenses | Jour de salaire |
+-------------+----------------------+-----------------------+-----------------+
| Janvier     | 2017-01-02           | 2017-01-16            | 2017-01-31      |
| Février     | 2017-02-01           | 2017-02-15            | 2017-02-28      |
| Mars        | 2017-03-01           | 2017-03-15            | 2017-03-31      |
| Avril       | 2017-04-03           | 2017-04-17            | 2017-04-28      |
| Mai         | 2017-05-01           | 2017-05-15            | 2017-05-31      |
| Juin        | 2017-06-01           | 2017-06-15            | 2017-06-30      |
| Juillet     | 2017-07-03           | 2017-07-17            | 2017-07-31      |
| Août        | 2017-08-01           | 2017-08-15            | 2017-08-31      |
| Septembre   | 2017-09-01           | 2017-09-15            | 2017-09-29      |
| Octobre     | 2017-10-02           | 2017-10-16            | 2017-10-31      |
| Novembre    | 2017-11-01           | 2017-11-15            | 2017-11-30      |
| Décembre    | 2017-12-01           | 2017-12-15            | 2017-12-29      |
+-------------+----------------------+-----------------------+-----------------+```
