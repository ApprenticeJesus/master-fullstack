
//IMPORTS NECESARIOS
import { ModuleWithProviders } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";

//IMPORTAR COMPÒNENTES
import { LoginComponent } from "./components/login/login.component";
import { RegisterComponent } from "./components/register/register.component";
import { ErrorComponent } from './components/error/error.component';
import { HomeComponent } from './components/home/home.component';

//DEFINIR RUTA
const appRoutes: Routes = [
    {path: '', component: HomeComponent},
    {path: 'inicio', component: HomeComponent},
    {path: 'login', component: LoginComponent},
    {path: 'registro', component: RegisterComponent},
    {path: '**', component: ErrorComponent}

];

//EXPORTAR CONFIGURACIÓN
export const appRoutingProviders: any[] = [];
export const routing: ModuleWithProviders<any> = RouterModule.forRoot(appRoutes);