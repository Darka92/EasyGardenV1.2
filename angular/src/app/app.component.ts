import { Component, OnInit  } from '@angular/core';


/*  MES IMPORTS  */

/*  SERVICES  */
import { ArrosagesService } from './services/arrosages.service';
import { EclairagesService } from './services/eclairages.service';
import { BassinsService } from './services/bassins.service';
import { TondeuseService } from './services/tondeuse.service';
import { PortailService } from './services/portail.service';



@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})


export class AppComponent implements OnInit {

  isAuth = false;

  eclairage: any[];
  arrosage: any[];
  bassin: any[];
  tondeuse: any[];
  portail: any[];
  someArrayOfThings: any[];

  p: number = 1;
  collection: any[] = this.someArrayOfThings;

  constructor(private eclairageService: EclairagesService,
              private arrosagesService: ArrosagesService, private bassinsService: BassinsService,
              private tondeuseService: TondeuseService, private portailService: PortailService) {

    setTimeout(
      () => {
        this.isAuth = true;
      }, 4000
    );
  }

  ngOnInit() {
    this.eclairage = this.eclairageService.eclairages;
    this.arrosage = this.arrosagesService.arrosages;
    this.bassin = this.bassinsService.bassins;
    this.tondeuse = this.tondeuseService.tondeuse;
    this.portail = this.portailService.portail;
  }

}

