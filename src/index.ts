
import * as jquery from 'jquery';

console.log('We are in');

const fn = (v) => {
    console.log('all good', v);
};

fn('test');

jquery(() => {
    console.log('finished');
});
