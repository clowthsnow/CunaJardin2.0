#include <iostream>
#include <pthread.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <string.h>
#include <time.h>

using namespace std;

class Cola {
private:
    class Nodo {
    public:
        int info;
        Nodo *sig;
    };

    Nodo *raiz;
    Nodo *fondo;
public:
    Cola();
    ~Cola();
    void insertar(int x);
    int extraer();
    void imprimir();
    int sacarDato();
    bool vacia();
};


Cola::Cola(){
    raiz = NULL;
    fondo = NULL;
}

Cola::~Cola(){
    Nodo *reco = raiz;
    Nodo *bor;
    while (reco != NULL){
        bor = reco;
        reco = reco->sig;
        delete bor;
    }
}

void Cola::insertar(int x){
    Nodo *nuevo;
    nuevo = new Nodo();
    nuevo->info = x;
    nuevo->sig = NULL;
    if (vacia()){
        raiz = nuevo;
        fondo = nuevo;
    }
    else {
        fondo->sig = nuevo;
        fondo = nuevo;
    }
}

int Cola::extraer(){
    if (!vacia()){
        int informacion = raiz->info;
        Nodo *bor = raiz;
        if (raiz == fondo){
            raiz = NULL;
            fondo = NULL;
        }else{
            raiz = raiz->sig;
        }
        delete bor;
        return informacion;
    }else
        return -1;
}

void Cola::imprimir(){
    Nodo *reco = raiz;
    cout << "Listado de todos los clientes de la cola.\n";
    while (reco != NULL){
        cout << reco->info << "-";
        reco = reco->sig;
    }
    cout << "\n";
}
int Cola::sacarDato(){
 if (!vacia()){
     int informacion = raiz->info;
     Nodo *bor = raiz;
     if (raiz == fondo){
         raiz = NULL;
         fondo = NULL;
     }else{
         raiz = raiz->sig;
     }
     return informacion;
 }else
     return -1;
}
bool Cola::vacia(){
    if (raiz == NULL)
        return true;
    else
        return false;
}


int C;

void * escogerProducto(void* cliente){
 C = 10+rand()%(21-10);// tiempo de atencion al cliente 10-20 segundos
 std::cout << "Cliente "<<(int) (intptr_t)cliente<< " ha elegido el producto en un tiempo "<<C << " segundos\n";
 
}

int main() {
 srand(time(NULL));
 int N = 3; //cantidad de cajeros
 int M = 5+rand()%(11-5); //cantidad de clientes 5-10
 int T = 10+rand()%(21-10); // tiempo en que el cliente es atendito 10-20 segundos

 Cola *clientes = new Cola();
 for (int i = 1; i <= M; i++) {
  clientes->insertar(i);
 }
 clientes->imprimir();


 pthread_t t[M];
 for (int i = 0; i < M; ++i) {

    pthread_create(&t[i], NULL, escogerProducto, (void*)clientes->sacarDato());
    std::cout << "" << '\n';

 }
 for (int i = 0; i < M; ++i) {
     pthread_join(t[i], NULL);
 }
 return 0;
}
