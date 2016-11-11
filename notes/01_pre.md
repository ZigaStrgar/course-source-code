# Prva ura krožka

V prvi uri krožka smo se dogovorili da se krožek izvaja ob četrtkih z začetkom ob 14:40. Naš kanal pogovarjanja bo potekal preko Facebook skupnega pogovora, vsa obvestila glede samega krožka bodo v pogovoru, prav tako lahko tam odgovarjam na vaša vprašanja.

# Za začetek

Kdor nima svojega računalnika na krožku lahko dela [TUKAJ](https://c9.io).

## Kako si usposobim Cloud9

* Prvo pogledam v facebook pogovor kakšno je ime in geslo
* Po uspešni prijavi kreiram nov workspace, najbolje kar [imepriimek]
  * V okno "Clone from Git or Mercurial URL" prilepim tale link [https://github.com/ZigaStrgar/course-source-code](https://github.com/ZigaStrgar/course-source-code)
  * Izberem PHP okolje
  * Create workspace
* Ko se vse skupaj skopira in naloži spodaj v terminal vpiši `./skripta.sh`
  * Spremljaj sam izpis ker potrebuje vašo potrditev, ponavadi Enter ali y
* Za konfiguracijo `.env` datoteke vprašaj v skupini ali na krožku samem.

That's it

## Kako si usposobim na svojem računalniku

* Poskrbim da imam naložen [Git](https://git-scm.com) in [Composer](https://getcomposer.org/download)
* Poskrbim da imam naložen PHP ≥ 5.6.4

Nato pa poženem
```bash
git clone https://github.com/ZigaStrgar/course-source-code
```

Preimenujem `.env.example` v `.env` in poskrbim da so vse vrednosti pravilno nastavljene
