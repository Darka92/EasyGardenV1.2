import { Injectable } from '@angular/core';


/* MES IMPORTS  */
import { Portail } from 'src/app/intranet/models/portail';



@Injectable({
  providedIn: 'root'
})



export class PortailsService {

  portails: Portail []=[];

  constructor() {

    let portails1: Portail = new Portail (1, 'Portail 1', 'Avant', true, true);
    let portails2: Portail = new Portail (2, 'Portail 2', 'Derrière', false, false);

    this.portails.push(portails1);
    this.portails.push(portails2);

  }

  public getPortails():Portail[] {
    return this.portails;
    /*console.log(this.portails);*/
  }

  public getPortail(portailId:number):Portail{
    let tableauportail=this.getPortails();
    return tableauportail.find(i=>i.portailId===portailId);
  };

  switchOnOne(i: number) {
    this.portails[i].statut = true;
  }

  switchOffOne(i: number) {
    this.portails[i].statut = false;
  }

}
