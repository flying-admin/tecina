import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'inarray'
})
export class InarrayPipe implements PipeTransform {

  transform(value: any, args?: any): any {
    console.log( value);
    console.log( args);
    
     if ((value.findIndex(element => { return element == args })) != -1){
       return true;
     }else{
       return false;
     }
  }

}
