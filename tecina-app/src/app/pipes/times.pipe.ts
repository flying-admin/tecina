import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'times'
})
export class TimesPipe implements PipeTransform {

  transform(value: any, args?: any): any {
    var array = [];
    for (let a = 0; a < args; a++) {
      array.push(a);
    }
    return array;
  }

}
