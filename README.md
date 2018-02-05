# tickettest
Ticket stock tracker for SportStadion

Step one seems to be dissecting the assignment and sort out any points of
unclarity. So I'll be basing my solution on a few assumptions:

1.  A HomeMatch has multiple Categories and Stands.
2.  Ticket prices are variable depending on category and stand.
3.  Based on the previous assumptions, a ticket has a base price, plus modifiers
    for both category and stand.
4.  As such, each Category-Stand combination per match needs a separate ticket
    stock.
5.  A HomeMatch can be found by filtering for its date_scheduled. There will not
    be any matches scheduled for the same date.
6.  As it is not part of the assignment, user authentication will be
    disregarded.

Step two is working out the REST api entry points. There are two ways the api
can be accessed:

1.  View all ticket information about a match. Does not update the stock.
      1.5:  This would be done with a GET request to
            `"www.test.nl/api/matches/01-01-2018"`
2.  Update the stock of a certain Match-Category-Stand combination.
      2.5:  This can be done with a PUT request to
            `"www.test.nl/api/matches/{ticket_id}"`
          This is sort of lazy and can probably be improved by having it accept
          more parameters like reservation size, and eventually stop requiring
          ticket ID (and therefore not requiring use of show() before reserve())

The model scheme is fairly straightforward. Here they are in pseudocode:

```
class HomeMatch:
    date_scheduled = DateField()
    base_price = FloatField()

class Category:
    name = CharacterField()
    price_mod = FloatField()

class Stand:
    name = CharacterField()
    price_mod = FloatField()

class TicketStock:
    size = IntegerField()
    match = ForeignKey(HomeMatch)
    category = ForeignKey(Category)
    stand = ForeignKey(Stand)
```

Note: the database hasn't been pushed yet. The settings are configured for SQlite. After database creation the generic seeder can be run to populate.
