import { Directive, Input,ElementRef ,OnInit} from '@angular/core';


@Directive({
  selector: 'img[default]',
  host: {
    '(error)':'updateUrl()',
    '[src]':'src'
   }
})
export class DefaultImageDirective implements OnInit{

  @Input() src:string;
  @Input() default:string;

  constructor(private elementRef: ElementRef) {
  }

  updateUrl(){
    this.src = this.default;
  }

  ngOnInit(){
  }
}