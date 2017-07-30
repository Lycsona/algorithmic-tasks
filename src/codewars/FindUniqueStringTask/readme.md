**There is an array of strings. All strings contains similar letters except one. Need to find it.**

***Some examples:***
[ 'Aa', 'aaa', 'aaaaa', 'BbBb', 'Aaaa', 'AaAaAa', 'a' ]);  // => 'BbBb'
[ 'abc', 'acb', 'bac', 'foo', 'bca', 'cab', 'cba' ]);  // => 'foo'

***Some tests:***

 - $this->assertEquals('BbBb', find_uniq([ 'Aa', 'aaa', 'aaaaa', 'BbBb',
   'Aaaa', 'AaAaAa', 'a' ]));
 - $this->assertEquals('foo', find_uniq([ 'abc', 'acb', 'bac', 'foo',
   'bca', 'cab', 'cba' ]));
 - $this->assertEquals('victor', find_uniq([ 'silvia', 'vasili',
   'victor' ]));
 - $this->assertEquals('Harry Potter', find_uniq([ 'Tom Marvolo Riddle', 'I am Lord Voldemort', 'Harry Potter' ]));

 
**Strings may contain spaces. Spaces is not significant, only non-spaces symbols matters. 
E.g. string that contains only spaces is like empty string.**