<?php if (isset($_SESSION['user_id'])) : ?>
<div id="tutorial">
<?php if (($_GET['tut']=='1') && ($membership->get_Rank_Id($_SESSION['user_id'])>=$_GET['tut'])) :?>
<h1>Tutorial Texturi</h1>
<p>Formele geometrice comune ne inconjoara; uneori mai bine definite, alteori mai subtile, aceste forme compun fotografia si creeaza un plus de dinamism. Daca va aflati in cautarea unei provocari, puteti incerca fotografierea texturilor si a sabloanelor. Acest exercitiu va va oferi o noua perspectiva asupra potentialelor subiecte de fotografie.
</p>
<h2>Observarea sabloanelor</h2>
<p>Desi la inceput vi se va parea greu de identificat, un sablon poate fi gasit oriunde si oricand. Un sablon nu reprezinta altceva decat repetarea unui element vizual, cum ar fi o forma geometrica, o linie sau o culoare, insa, datorita faptului ca suntem foarte obisnuiti cu ceea ce ne inconjoara, uneori poate fi dificil de localizat in multitudinea de elemente ce compun o scena.</p>
<p>Formele ce alcatuiesc sabloane placute sunt patratele, triunghiurile, cercurile sau succesiunile de linii. Cea mai buna metoda de a accentua un sablon este crearea unei fotografii abstracte, taind din cadru toate detaliile inutile. in acest mod, va rezulta o fotografie in care exista o relatie clara intre elementele cheie.</p>
<p>Alegerea obiectivului este cruciala in acest tip de fotografie. Un obiectiv wide va va permite relationarea dintre prim plan si planul secund al fotografiei, in timp ce un teleobiectiv va compresa perspectiva si va face ca obiectele sa para mai apropiate decat sunt in realitate.</p>
<h2>Fotografierea texturilor</h2>
<p>Cei mai importanti factori in fotografierea texturilor sunt apropierea de subiect si iluminarea corespunzatoare. Ca o regula generala, cu cat va apropiati mai mult de subiect, cu atat textura va fi mai vizibila. Cea mai buna varianta pentru focusarea texturii este folosirea teleobiectivului, deoarece acesta izoleaza subiectul fotografiat. Dar nu trebuie sa va opriti aici, daca vreti sa aduceti textura la viata o puteti face prin investitii putin costisitoare in ceea ce priveste aparatura: lentile close-up sau tuburi de extensie. Daca nu ati mai folosit pana acum aceste accesorii, veti fi placut surpinsi sa vedeti in fotografie detalii care uneori nu se pot observa cu ochiul liber.</p>
<p>Pentru a surprinde textura la o calitate superioara, este necesar ca fiecare particularitate a suprafetei sa proiecteze o umbra. Lumina trebuie sa fie amplasata intr-un loc corespunzator, cea mai nefavorabila iluminare fiind cea frontala. in aceasta situatie, rezultatele vor fi nesatisfacatoare deoarece foarte multe detalii se pierd. Astfel, pentru obtinerea cat mai multor detalii ale texturii fotografiate, lumina trebuie sa cada asupra subiectului dintr-o parte, pentru a proiecta umbre fotogenice. Cand va hotarati sa fotografiati texturi afara, incercati sa o faceti dimineata, imediat dupa rasaritul soarelui sau inainte ca acesta sa apuna.</p>
<h2>Localizarea texturilor</h2>
<p>Avand in vedere faptul ca orice obiect are o textura, nu exista o lipsa de material fotografic, desi cel mai usor de valorificat vor fi obiectele nefinisate, cu o suprafata rugoasa. Texturile pot fi exploatate atat in mediul natural, cat si in cel creat de om.</p>
<p>in natura veti gasi o multime de texturi. Puneti-va bocancii de munte si rucsacul in spate si veti fi "recompensati" cu mii de texturi superbe. Prea energic? Atunci faceti o plimbare prin gradina si vedeti ce gasiti. Pamantul insusi poate fi un punct bun de plecare, sau cerul plin de nori schimbatori. Copacii au de asemenea o varietate de texturi, de la scoarta pana la nervurile frunzelor. Apa nu pare un subiect evident pentru fotografierea texturilor, dar de fapt este un mediu superb ce merita exploatat, pe suprafete care isi schimba culorile in functie de momentul zilei, lumina si vreme.</p>
<p>Mediul construit ofera oportunitati in fotografierea texturilor la fel de diverse ca si mediul natural. Cladirile in particular sunt pline de posibilitati: peretii construiti din caramida, lemn, sau piatra, acoperisurile, diferitele tipuri de usi si ferestre...lista este infinita.</p>
<h2> Tema: </h2>
<p>Prindeti un cadru cu o textura, incercati sa va alegeti textura care va reprezinta.</p>
<?php if (!$membership->get_Work($_GET["tut"],$_SESSION['user_id'])):?>
<p> Click <a href="#tema">aici</a> pentru a uploada tema.</p>
<?php else: ?>
<p> Click <a href="#tema">aici</a> pentru a schimba tema.</p>
<img class="header-divs-anim view imgAnch tutsWork" src="/images/<?php echo $_SESSION['user_id']?>/thumb/<?php echo $membership->get_Work($_GET['tut'],$_SESSION['user_id'])?>">
<img class="nrFramed" src="images/icons/framed.png">
<p class="pFramed"><?php if (!$membership->frame_Framed($membership->get_Work(1,$_SESSION['user_id']))) echo '0'; else echo sizeof($membership->frame_Framed($membership->get_Work(1,$_SESSION['user_id'])));?></p>
<p class="pFramed" id="mention"> [trebuie sa primiti 5 aprecieri pentru a putea trece la urmatorul tutorial]
</p>
<?php endif;endif;?>

<?php if (($_GET['tut']=='2') && ($membership->get_Rank_Id($_SESSION['user_id'])>=$_GET['tut'])) :?><h1>Tutorial Portrete</h1>
<p>Exista aproximativ 10 reguli (sugestii) care ar trebui respectate daca cineva se asteapta ca portretele sale sa se ridice deasupra nivelului "aceasta este o poza draguta" la starea "Uau, dumneavoastra ati facut asta?". Nu le-am vazut niciodata intr-o carte si publicate in afara de o carte publicata de maestrul fotograf Don Peterson scrisa in 1985. El a listat 25 dintre ele. Chiar si atunci cand le caut cu Google tot ce obtin sunt regulile lui (publicate de mine si un alt fotograf) de-a lungul ultimilor ani pe variate site-uri web. Cateva dintre aceste reguli au devenit "invechite" in noul mileniu. Am adunat aceste reguli de-a lungul ultimilor 25 de ani ca fotograf profesionist. Cateva dintre ele au fost modificate de relaxarea generala a pozarii (aranjarii) persoanelor in ultimii zece - cinsprezece ani.
</p>
<h2>Reguli pentru portrete</h2>
<p>De ce reguli in realizarea portretelor? Cei mai multi oameni nu vor cheltui $100.00 pentru un instantaneu 20cm x 25cm pe care il pot face ei singuri cu un aparat foto compact in curtea din spatele casei lor. Ei vor cheltui totusi $100.00 (sau mai mult) pentru un portret 20cm x 25cm daca este un portret foarte frumos a cuiva apropiat, unul in care ei arata bine; si daca veti respecta regulile veti obtine portrete frumoase. Odata ce le-ati invatat le puteti flexa sau incalca putin pentru a obtine imaginea perfecta pe care o "vedeti" in mintea dumneavoastra.</p>
<p>Aceste reguli sunt pentru PORTRETE. Asa cum este o diferenta intre o camioneta si o masina sport, chiar daca ambele sunt vehicole, folosesc benzina si va vor transporta confortabil la destinatie, exista deasemenea o diferenta intre imaginile de portret si cele de moda. La portrete totul se leaga de fata. De fapt cuvantul "portret" inseamna literal "Un desen asemanator cu sau o fotografie a unei fete." In fotografia de moda totul se leaga de haine. In timp ce unele reguli se vor aplica atat fotografiei de moda cat si celei de portret altele nu se vor aplica.</p>
<h2>Regula 1</h2>
<p>Nu se va folosi imbracaminte fara maneci in portretul bust (cap si umeri).* Am facut imaginea din stanga si am clonat bluza sa de cateva ori pentru a acoperi partea superioara a bratului drept. De notat diferinta in ce priveste locul unde este atrasa privirea cand se priveste imaginea. Intr-un portret primul lucru pe care trebuie sa-l vedeti este fata.</p>
<h2>Regula 2</h2>
<p>Nu se vor folosi pantaloni scurti in portretele de grup.* Aceasta mi s-a intamplat de doua ori anul acesta (pentru prima oara in ani); chiar daca noi specificam in mod clar in consultatia in ce priveste imbracamintea FARA PANTALONI SCURTI tot se mai prezinta persoane in pantaloni scurti. Cand aceasta familie a sunat, ei au zis ca doreau sa fie fotografiati in blue jeans si au intrebat daca e in regula. Am zis da si am spus mamei sa se asigure ca bluzele/camasile sunt toate de aceeasi culoare. Eu ma asteptam desigur la blue jeans normali NU scurti. Imaginea de mai jos e una dintre poze. De notat cum picioarele dezgolite ale tatalui si celei mai tinere fiice atrag cu adevarat atentia. Asta pentru ca privirile noastre sunt atrase de pielea dezgolita si de aceea SINGURA piele dezgolita care ar trebui sa apara intr-un portret este fata. Amintiti-va, FATA este tot ceea ce conteaza in portrete.
</p>
<h2>Regula 3</h2>
<p>Evitati culori stralucitoare si modele izbitoare pentru haine.* Ideia unui portret este sa se vada fata subiectului. Hainele cu culori stralucitoare si modele izbitoare muta atentia de la fata subiectului. (Aceasta este mult mai valabil pentru portretul bust.)</p>
<h2>Regula 4</h2>
<p>Evitati umerii de jucator de fotbal american.* Corpul ar trebui sa nu fie orientat paralel cu senzorul (filmul) aparatului foto.</p>
<h2>Regula 5 - Baza piramidala solida</h2>
<p>Corpul ar trebui sa nu fie intors la 90 de grade fata de aparatul foto. 45 de grade este de obicei unghiul ideal pentru portretul bust (cap si umeri). Aranjarea subiectului sub un unghi de 90 de grade fata de aparatul foto nu permite capului sa apara ca avand un suport corespunzator. Dupa aranjarea subiectului la un unghi de 45 de grade mutati bratele acestuia in exterior (lateral) pentru a forma marginile unei piramide. Regulile de mai sus sunt adevarate fie daca se fotografiaza un portret cap si umeri fie daca se fotografiaza un portret de familie pe intreaga lungime (inaltime). Exemplele mele vor fi pentru imaginea bust. Am imprumutat aceste imagini din DVD-ul meu "Photographing The High School Senior Girl in the New Millenium." (Fotografierea absolventei de liceu in noul mileniu). De notat ca am incalcat regula "fara maneci scurte". Amintiti-va, obiectivul principal pentru portrete este sa se pastreze fata subiectului drept cel mai important lucru.</p>
<h2>Regula 6</h2>
<p>Nu permiteti subiectului dumneavoastra sa stea cocosat sau sa aiba umerii rotunjiti. De notat cum May s-a arcuit in ambele imagini facand-o scurta si ingramadita.</p>
<h2>Regula 7 - Scaun</h2>
<p>Am descoperit ca o scarita inalta de 60 cm face minuni cand este utilizata drept scaunel de pozare pentru aproape toate portretele bust traditionale, cu conditia ca subiectul meu sa nu fie supraponderal. Pentru subiectul supraponderal utilizati un scaunel mai inalt pentru a permite burtii sa se lase in jos. Am adaugat o parte superoara mai lata (scaunelul) la scara din lemn pentru ca posteriorul majoritatii populatiei e mai lat de 10 cm!</p>
<h2>Regula 8 - Ochi</h2>
<p>In general vorbind, pentru barbati ochii trebuie sa urmareasca directia nasului. Pentru femei ar trebui sa fie usor mai mult alb al ochilor intr-o parte decat in cealalta.</p>
<p>Ochii ar trebui sa nu fie niciodata intorsi in orbite atat de mult astfel incat sa nu existe zona cu alb pe o parte si dumneavoastra ar trebui sa nu fotografiati spre albul ochilor. Un unghi al aparatului foto usor mai inalt va va da mai mult alb in partea de jos decat in partea de sus ceea ce este mai atragator in imaginile femeilor tinere.</p>
<h2>Regula 9</h2>
<p>Portretele de obicei arata cel mai bine cu o parte mai stralucitoare decat cealalta. Cand partea cu umbre a fetei este cea mai apropiata de aparatul foto se numeste iluminare scurta. Iluminarea scurta va face fata sa apara mai zvelta. Daca umbra este pe partea opusa obiectivului se numeste iluminare larga. Iluminarea larga va face fata sa apara mai larga si mai cu greutate. Iluminarea plana este aceea pentru care nu exista deloc umbre pe fata. Blitul pe aparatul foto va va da iluminare plana. In imaginea de mai jos, imaginea iluminata plan a fost iluminata cu o lumina inel artizanala (facuta de mine), cealalta cu un softbox 60cm x 80cm pozitionat in dreapta aparatului foto.</p>
<h2>Regula 10</h2>
<p>Daca se indoaie atunci indoiti! Aceasta regula singura e probabil cea mai importanta regula.</p>

<h2> Tema: </h2>
<p>Executati un portret, incercati sa tineti cont de regulile enuntate mai sus.</p>
<?php if (!$membership->get_Work($_GET["tut"],$_SESSION['user_id'])):?>
<p> Click <a href="#tema">aici</a> pentru a uploada tema.</p>
<?php else: ?>
<p> Click <a href="#tema">aici</a> pentru a schimba tema.</p>
<img class="header-divs-anim view imgAnch tutsWork" src="/images/<?php echo $_SESSION['user_id']?>/thumb/<?php echo $membership->get_Work($_GET['tut'],$_SESSION['user_id'])?>">
<img class="nrFramed" src="images/icons/framed.png">
<p id="pFramed">10</p>
<?php endif;
else :
header("location: tutorial.php?tut=" .  $membership->get_Rank_Id($_SESSION['user_id']));
endif;?>
<?php if (($_GET['tut']=='3') && ($membership->get_Rank_Id($_SESSION['user_id'])>=$_GET['tut'])) :?><h1>Tutorial Peisaje</h1>
<h2>De ce este important sa vorbim despre obiective?</h2>
<p>Alegerea obiectivului potrivit pentru o anumita imagine este o decizie importanta. Aceasta decizie urmeaza decizia anterioara privind compozitia imaginii, care la rindul ei urmeaza intentia de a fotografia un anumit subiect. Pe scurt, acesti pasi in realizarea unei imagini sint necesari si in relatie directa. Prin alegerea unui anumit obiectiv, definim modul in care dorim sa fotografiem subiectul ales. Trecem practic de la vizualizarea subiectului la creatie si pentru prima data chiar folosim aparatul foto. Sintem la un pas de a realiza imaginea!
</p>
<h2>Obiectivele sint importante si chiar mai importante decit aparatul folosit.</h2>
<p>Ce poate fi mai simplu decit sa alegi un obiectiv pentru o anumita imagine? Daca fotografiezi un peisaj panoramic, un obieciv grand-angular este cel mai util. Daca vrei sa fotografiezi un detaliu indepartat, folosesti un teleobiectiv. Cind subiectul este undeva intre aceste doua extreme, folosesti un obiectiv normal.
Deci, ce trebuie stiut mai mult decit atit despre alegerea obiectivului ? In primul rind alegerea obiectivului trebuie facuta pe baza modului in care doresti sa prezinti scena din fata ta. Cu alte cuvinte, si amintind primul articol din serie, "Cum sa vezi fotografic", obiectivul folosit trebuie sa fie in concordanta cu viziunea ta, si in al doilea rind, sa fie potrivit compozitiei dorite.</p>
<h2>Un peisaj, trei obiective posibile</h2>
<p>Deci care sint modurile in care putem vedea lumea diferit prin fotografiere? Pentru simplificare am impartit posibilitatile in trei tipuri principale folosind cele trei tipuri clasice de obiective: grand-angulare, normale si teleobiective.
Trecind de la un grand-angular la normal si la tele, unghiul de cuprindere
se modifica treptat, mergind de la foarte larg pina la foarte ingust. Folosind aceste obiective, atentia privitorului se concentreaza asupra unei parti din peisaj din ce in ce mai mica.
</p><p>
Pentru a accentua relatia intre obiectivul folosit si peisaj, am denumit categoriile de imagine care se pot realiza "peisaj larg", "peisaj mediu" si "peisaj restrins". Decizia de a fotografia un peisaj apartine fotografului, incepind de la o cuprindere larga, pina la o decupare a unui detaliu. Desigur, anumite tipuri de peisaje sint redate mai bine intr-un anumit unghi de cuprindere, dar trebuie retinut ca orice subiect se poate fotografia in toate cele trei moduri.</p>
<h2>Peisajul larg</h2>
<p>Obiectivele grand-angulare creeaza in general compozitiile cele mai dinamice. Aceste obiective introduc impresia de "miscare" in imagine, permitind cuprinderea obiectelor din apropiere cit si din departare in acelasi timp. Ca sa vedem clar la fel de mult ca un obiectiv grand-angular, trebuie sa intoarcem capul orizontal ori vertical. Dat fiind ca unghiul de vedere uman are un cimp redus de redare clara a imaginii, acesta nu poate fi egalat decit privind prin vizorul aparatului echipat cu un obiectiv grand-angular. </p>
<p>O compozitie aproape-departe este usor de realizat cu un obiectiv grand-angular. De notat ca aceasta compozitie este posibila si cu celelalte 2 tipuri de obiective. Dar compozitiile respective nu vor avea acelasi grad de dinamism. In aceste cazuri pentru a mentine claritatea in imagine trebuie ca obiectele din prim-plan sa fie prea departate. Acest fenomen va rezulta in imagine intr-o aparenta compresie a elementelor, ceea ce va duce la o imagine statica. Compresia este rezultatul unghiului mai ingust de cuprindere in cazul obiectivelor normale ori tele. Vezi mai jos exercitiul pe care il sugerez pentru a verifica acest fenomen.</p>
<p>Un fotograf cu experienta este capabil sa creeze imagini interesante cu o varietate de obiective. In mod similar, un fotograf bun poate crea imagini bune si cu obiective normale. Observarea, compozitia, lumina, stilul personal, sint independente de echipamentul la dispozitie. Daca nu putem poseda acest echipament in orice situatie, putem insa controla viziunea noastra.
</p><p>
Ce este mai important in aceasta discutie este faptul ca un obiectiv normal ne ajuta sa cream ceea ce numesc "peisaj mediu". Aceste imagini se incadreaza intre peisajul larg si peisajul restrins. Cum unghiul de cuprindere al obiectivelor grand-angulare nu este intotdeauna de dorit, o imagine care este mai putin dinamica, mai putin exagerata ca perspectiva, se poate realiza cu un obiectiv normal. Folosirea unui obiectiv normal poate duce la scoaterea in evidenta a unor detalii care se pierd in unghiul larg de cuprindere al unui grand-angular. In loc sa ne distribuim atentia asupra "totului", ne concen- tram asupra unor parti din "tot".</p>
<h2>Peisajul mediu</h2>
<p>Un obiectiv normal are o distanta focala care da un unghi de cuprindere aproximativ egal cu cel al ochiului uman. Cu alte cuvinte, privind printr-un astfel de obiectiv, o sa vedem clar cam acelasi spatiu pe care il vedem si cu ochiul liber. Distanta focala normala pentru orice tip de film ori senzor de imagine, este egala cu diagonala suportului de imagine. Pentru formatul 35mm, distanta focala normala este de 50mm, pentru formatul mediu 6x6, focala normala este de 80mm, s.a.m.d. Pentru multi fotografi un obiectiv normal este considerat "plictisitor". De ce sa realizezi imagini pe care poti sa le vezi cu ochiul liber la fel de bine? Hai sa folosim un grand-angular ori un super teleobiectiv!</p>
<h2>Peisajul restrins</h2>
<p>A treia categorie de peisaje este prin definitie cea continand elemente izolate din peisaj, elemente care pot fi usor trecute cu vederea cind privim scena in ansamblu. Obiectivele grand-angulare redau peisajul in mod surprinzator, aratind mult mai mult decit putem noi vedea cu ochii proprii. Teleobiectivele ne surprind insa prin redarea multor detalii din peisaj, pe care din nou nu putem sa le vedem singuri.
Detaliile obiectelor din departare pe care nu le putem vedea sint redate cu absoluta claritate de aceste obiective. Aceste imagini ne dezvaluie secretele peisajului si ne fac sa gindim la ce alte lucruri sint ascunse in el. </p>
<h2> Tema: </h2>
<p>Mergi intr-un loc pe care il cunosti bine si iti place. Ia cu tine numai 1 obiectiv, oricare ar fi acesta. Nu intrebuinta insa un zoom, deoarece va fi tentant sa iesi din cadrul exercitiului propus.</p>
<?php if (!$membership->get_Work($_GET["tut"],$_SESSION['user_id'])):?>
<p> Click <a href="#tema">aici</a> pentru a uploada tema.</p>
<?php else: ?>
<p> Click <a href="#tema">aici</a> pentru a schimba tema.</p>
<img class="header-divs-anim view imgAnch tutsWork" src="/images/<?php echo $_SESSION['user_id']?>/thumb/<?php echo $membership->get_Work($_GET['tut'],$_SESSION['user_id'])?>">
<img class="nrFramed" src="images/icons/framed.png">
<p id="pFramed">10</p>
<?php endif;
else :
header("location: tutorial.php?tut=" .  $membership->get_Rank_Id($_SESSION['user_id']));
endif;?>

<?php if (($_GET['tut']=='4') && ($membership->get_Rank_Id($_SESSION['user_id'])>=$_GET['tut'])) :?><h1>Tutorial Macro</h1>
<p>Fotografiile macro sunt unele dintre cele cu cel mai mare impact asupra privitorilor, fiind realizate de o mulţime de fotografi atât profesionişti cât şi amatori, devenind astfel cel mai practicat gen fotografic. Datorită popularităţii ridicate, fotografiile macro sunt foarte variate, incluzând o multitudine de subiecte cu potenţial fotografic, fiind astfel sursa interminabilă a oricărui fotograf pasionat de acest gen. Acest gen al artei fotografice nu presupune doar fotografierea insectelor şi a vietăţilor, ci şi a unor alte obiecte (devenind macro-conceptual) sau a unor părţi ale corpului (în fotografiile cu modele).</p>
<h2>Insectele, cum le abordez pentru a obţine fotografii bune </h2>
<p>Fotografiatul insectelor este unul dintre cele mai populare genuri din acest domeniu, fiind renumit în întreaga lume datorită simplicităţii aparente. Faptul că sunt privite a fi simple snapshoot-uri care pot fi realizate de oricine oferă mult curaj amatorilor şi tuturor începătorilor de a practica acest gen, căzând într-un oarecare miraj, toul fiind foarte uşor în primele momente, contrariul având a se dovedi în următoarele clipe.
</p><p>
Pentru a fotografia insecte răbdarea este în prim-plan, necesitând atât o atenţie ridicată cât şi abilitatea de a aştepta şi a rămâne nemişcate minute întregi. Insectele sunt foarte mici, însă foarte rapide şi fricoase, reacţionând la orice vibraţie, orice sunet, orice mişcare. Astfel, trebuie să fiţi cât se poate de silenţioşi, dar şi foarte atenţi, pentru a descoperi locurile în care vin vietăţile, florile din care se hrănesc, putând apoi a le ademeni mult mai uşor către locul în care doriţi a le fotografia.
</p><p>
În cazul în care doriţi să găsiţi insecte mai rare, o documentare despre habitatul acestora şi locul în care trăiesc este mai mult decât necesară, deoarece le veţi putea găsi cu uşurinţă, fără a căuta prea mult. De altfel, unele insecte pot fi ademenite foarte uşor prin folosirea diverselor “capcane”; după ce veţi observa locul din care se hrănesc, mutarea plantei (hranei) într-un loc mai accesibil vă poate uşura foarte mult munca. În cazul în care vor veni veţi avea mult mai mult timp de fotografiat, datorită faptului că veţi avea o posiţie fixă, nefiind necesară căutarea insectei într-o zonă foarte largă.</p>
</p>
<h2>De ce echipament am nevoie?</h2>
<p>
Făcând referire la popularitatea ridicată a acestui gen se deduce faptul că echipamentul necesar nu este unul foarte special, fiind accesibil tuturor. Specific oricărui gen fotografic, există şi accesorii speciale care vă pot transforma simplul aparat într-o cameră deosebită, dedicată macro.
</p><p>
În cazul în care deţineţi un aparat compact sau un D-SLR al cărui obiectiv nu este special pentru macro, există câteva mici trucuri DIY care vă pot îmbunătăţii foarte mult rezultatele. Unul dintre cele mai cunoscute artificii pentru a te putea apropria mult mai mult de subiect este folosirea binecunoscutei lupe, lucru foarte ieftin, însă cu rezultate destul de bune. Dacă obiectivul folosit este unul cu o calitate peste medie, rezultatele obţinute vor fi foarte bune, aberaţiile cromatice fiind practic inexistente. (mai multe detalii despre această metoda aici)
</p><p>
Alte accesorii înafară de obiectivele macro dedicate ce vă pot aduce mai aproape de subiect obţinând un raport de mărire apropriat de 1:1 ar putea fi lentilele close-up (sunt foarte asemănătoare cu lupa, doar că mai scumpe) şi tuburile de extensie, care, folosite împreună cu un obiectiv bun, pot realiza fotografii macro foarte detaliate. O metodă relativ nouă este folosirea unui “burduf macro” care, mărind distanţa de la senzor la obiectiv, scade distanţa de focalizare, crescând astfel raportul de mărire dar şi rezoluţia imaginii, evitând un crop mult mai strâns.
</p><p>
Pentru a obţine o lumină uniformă, mult mai plăcută în acest tip de fotografii, folosirea unui bliţ extern este cea mai bună soluţie, necesitând însă şi alte accesorii pentru a transpune fasciculul de lumină în faţa obiectivului, circular, şi nu perpendicular. Aceste inele pentru bliţuri vor împrăştia lumina pe o suprafaţă mult mai mare, evitând astfel atât umbrele dure dar şi reflexiile puternice de pe obiecte sau insecte.
</p>
<h2>Cum trebuie să combin detaliile tehnice?</h2>
<p>Detaliile tehnice necesită o atenţie sporită, combinarea reuşită a lor putând a vă prezenta rezultate pe măsură, transmiţând în acelaşi timp şi gânduri plăcute, reuşind de multe ori a transpune privitorul exact în momentul fotografierii, datorită atmosferei plăcute realizate în aceasta. Astfel, expunerea, diafragma, sensitivitatea şi balansul alb trebuie combinate şi setate cu grijă pentru a obţine fotografii reuşite. Expunerea, unul dintre cele mai importante elemente necesare în realizarea unei fotografii, trebuie verificată cu atenţie înainte de declanşare.
</p><p>
În cazul în care fotografiaţi pe lumină naturală (cea a soarelui) se recomandă verificarea expunerii vizual, şi nu în funcţie de exponometru, din cauza faptului că uneleori umbrele şi razele puternice vor determina o supra/subexpunere a fotografiilor. Dacă doriţi să supraexpuneţi, historigrama vă poate ajuta foarte mult; expunerea poate fi mărită până în momentul în care tonurile încep a se îndrepta spre dreapta axei fără a obţine o fotografie arsă, rezultatul fiind unur foarte plăcut, foarte contrastant.
</p><p>
De asemenea diafragma joacă şi ea un rol foarte important în realizarea fotografiilor, mărind sau scăzând câmpul de profunzime dar şi lumina care pătrunde pe senzor în funcţie de necesităţi. La fotografiatul insectelor se recomandă o diafragmă cât mai închisă pentru a înacadra întreg subiectul în zona de focus, detaliile obţinute astfel uneleori fiind foarte clare datorită faptului că majoritatea obiectivelor îşi măresc rata de sharpness în momentul în care diafragma se închide mai mult de f/7.1 .
</p><p>
Sensitivitatea ISO şi balansul alb pot schimba în totalitate modul în care va ieşi rezultatul. Datorită faptului că se recomandă utilizarea unui timp de expunere destul de mic pentru a surprinde momentele din natură mult mai clar, valoarea ISO-ului va trebui modificată regulat în funcţie de lumina disponibilă. Dacă fotografiaţi insecte este necesar un timp mai scut de 1/160 din cauza mişcărilor foarte rapide realizate de acestea. Timpul de expunere nu mai este însă o problemă la realizarea fotografiilor macro într-un spaţiu închis, în care subiectul este defapt un obiect, putând astfel a menţine sensitivitatea ISO la valori foarte mici.
</p>
<h2> Tema: </h2>
<p>Prinde un cadru cu o insecta, prin care sa folosesti tehnica macro si sa ii suprinzi principalele caracteristici.</p>
<?php if (!$membership->get_Work($_GET["tut"],$_SESSION['user_id'])):?>
<p> Click <a href="#tema">aici</a> pentru a uploada tema.</p>
<?php else: ?>
<p> Click <a href="#tema">aici</a> pentru a schimba tema.</p>
<img class="header-divs-anim view imgAnch tutsWork" src="/images/<?php echo $_SESSION['user_id']?>/thumb/<?php echo $membership->get_Work($_GET['tut'],$_SESSION['user_id'])?>">
<img class="nrFramed" src="images/icons/framed.png">
<p id="pFramed">10</p>
<?php endif;
else :
header("location: tutorial.php?tut=" .  $membership->get_Rank_Id($_SESSION['user_id']));
endif;?>

</div>
<?php endif;?>