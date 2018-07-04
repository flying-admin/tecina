import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'inarray'
})
export class InarrayPipe implements PipeTransform {

  transform(value: any[], args?: any): any {
    
    console.log("value.indexOf(args)",value.indexOf(args));
    
     if (value.indexOf(args) != -1){
       console.log("true");
       
       return true;
     }else{
      console.log("flase");
       return false;
     }
  }

}
