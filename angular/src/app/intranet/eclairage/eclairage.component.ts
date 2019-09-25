import { Component, OnInit, OnDestroy } from '@angular/core';
import { EclairageService } from 'src/app/services/eclairage.service';

@Component({
  selector: 'app-eclairage',
  templateUrl: './eclairage.component.html',
  styleUrls: ['./eclairage.component.css']
})

export class EclairageComponent implements OnInit, OnDestroy {

  data;

  index: number;

  constructor(private eclairageService: EclairageService) {

    console.log(this.eclairageService.eclairage);

    this.data = this.eclairageService.eclairage;

  }

  ngOnInit() {
  }

  ngOnDestroy() {
  }

  getColor(statut) {
    if (statut === 'On') {
      return 'green';
    } else if (statut === 'Off') {
      return 'red';
    }
  }

  onSwitch(i, statut) {
    if (statut === 'On') {
      this.eclairageService.switchOffOne(i);
    } else if (statut === 'Off') {
      this.eclairageService.switchOnOne(i);
    }
  }

  update(d1, d2, d3 , d4, d5) {
    let statut = d1;
    let nom = d2;
    let localisation = d3;
    let capteurAmpoule = d4;
    let capteurLuminosite = d5;
    console.log(statut, nom, localisation, capteurAmpoule, capteurLuminosite);
  }

}
