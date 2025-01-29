/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

( e => {
const { [ 'sr' ]: { dictionary, getPluralForm } } = {"sr":{"dictionary":{"Words: %0":"Речи: %0","Characters: %0":"Карактери: %0","Widget toolbar":"Widget traka sa alatkama","Insert paragraph before block":"Umetnite odlomak pre bloka","Insert paragraph after block":"Umetnite odlomak posle bloka","Press Enter to type after or press Shift + Enter to type before the widget":"Притисните Ентер да куцате после или притисните Схифт + Ентер да куцате пре виџета","Keystrokes that can be used when a widget is selected (for example: image, table, etc.)":"Tasteri koji se mogu koristiti kada je vidžet izabran (na primer: slika, tabela, itd.)","Insert a new paragraph directly after a widget":"Umetni novi pasus direktno posle vidžeta","Insert a new paragraph directly before a widget":"Umetni novi pasus direktno pre vidžeta","Move the caret to allow typing directly before a widget":"Pomeri kursor kako bi se omogućilo kucanje direktno pre vidžeta","Move the caret to allow typing directly after a widget":"Pomeri kursor kako bi se omogućilo kucanje direktno posle vidžeta","Move focus from an editable area back to the parent widget":"Vratite fokus sa oblasti koja se može uređivati na matični vidžet","Upload in progress":"Постављање у току","Undo":"Повлачење","Redo":"Поново","Rich Text Editor":"Проширен уређивач текста","Edit block":"Блок уређивач","Click to edit block":"Kliknite da biste uredili blok","Drag to move":"Prevucite da biste premestili","Next":"Следећи","Previous":"Претходни","Editor toolbar":"Уређивач трака са алаткама","Dropdown toolbar":"Падајућа трака са алаткама","Dropdown menu":"Padajući meni","Black":"Црна","Dim grey":"Бледо сива","Grey":"Сива","Light grey":"Светло сива","White":"Бела","Red":"Црвена","Orange":"Нараџаста","Yellow":"Жута","Light green":"Светлозелена","Green":"Зелена","Aquamarine":"Зеленкастоплава","Turquoise":"Тиркизна","Light blue":"Светлоплава","Blue":"Плава","Purple":"Љубичаста","Editor block content toolbar":"Трака са алаткама за блокирање садржаја уређивача","Editor contextual toolbar":"Контекстуална трака са алаткама Едитор","HEX":"HEX","No results found":"Nije pronađen nijedan rezultat","No searchable items":"Nema stavki koje se mogu pretražiti","Editor dialog":"Dijalog za uređivanje","Close":"Zatvori","Help Contents. To close this dialog press ESC.":"Sadržaji za pomoć. Kako biste zatvorili ovaj dijalog pritisnite taster ESC.","Below, you can find a list of keyboard shortcuts that can be used in the editor.":"Ispod možete pronaći listu prečica na tastaturi koje se mogu koristiti u uređivaču.","(may require <kbd>Fn</kbd>)":"(možda će biti neophodan <kbd>Fn</kbd>)","Accessibility":"Pristupačnost","Accessibility help":"Pomoć oko pristupačnosti","Press %0 for help.":"Pritisni %0 za pomoć.","Move focus in and out of an active dialog window":"Pomeri fokus u i van aktivnog prozora dijaloga","MENU_BAR_MENU_FILE":"Datoteka","MENU_BAR_MENU_EDIT":"Уреди","MENU_BAR_MENU_VIEW":"Prikaži","MENU_BAR_MENU_INSERT":"Убаци","MENU_BAR_MENU_FORMAT":"Format","MENU_BAR_MENU_TOOLS":"Alati","MENU_BAR_MENU_HELP":"Pomoć","MENU_BAR_MENU_TEXT":"Текст","MENU_BAR_MENU_FONT":"Font","Editor menu bar":"Traka menija uređivača","Please enter a valid color (e.g. \"ff0000\").":"Unesite važeću boju (npr. „ff0000“).","Insert table":"Додај табелу","Header column":"Колона за заглавље","Insert column left":"Додај колону лево","Insert column right":"Додај колону десно","Delete column":"Бриши колону","Select column":"Изабери колону","Column":"Колона","Header row":"Ред за заглавлје","Insert row below":"Додај ред испод","Insert row above":"Додај ред изнад","Delete row":"Бриши ред","Select row":"Изабери ред","Row":"Ред","Merge cell up":"Спој ћелије на горе","Merge cell right":"Спој ћелије на десно","Merge cell down":"Спој ћелије на доле","Merge cell left":"Cпој ћелије на лево","Split cell vertically":"Дели ћелије усправно","Split cell horizontally":"Дели ћелије водоравно","Merge cells":"Спој ћелије","Table toolbar":"Табела трака са алаткама","Table properties":"Својства табеле","Cell properties":"Својства ћелије","Border":"Граница","Style":"Стил","Width":"Ширина","Height":"Висина","Color":"Боја","Background":"Позадина","Padding":"Постављање","Dimensions":"Димензија","Table cell text alignment":"Поравнај тексту табели","Alignment":"Поравнање","Horizontal text alignment toolbar":"Хоризонтална трака са алаткама за поравнање текста","Vertical text alignment toolbar":"Вертикална трака са алаткама за поравнање текста","Table alignment toolbar":"Трака са алаткама за поравнање табеле","None":"Ниједан","Solid":"Чврст","Dotted":"Са тачкама","Dashed":"Разбијено","Double":"Двоструко","Groove":"Колосек","Ridge":"Гребен","Inset":"Прилог","Outset":"Почетак","Align cell text to the left":"Поравнајте текст ћелије лево","Align cell text to the center":"Поравнајте текст ћелије у средину","Align cell text to the right":"Поравнајте текст ћелије десно","Justify cell text":"Оправдајте текст ћелије","Align cell text to the top":"Поравнајте текст ћелије према горе","Align cell text to the middle":"Поравнајте текст ћелије у средину","Align cell text to the bottom":"Поравнајте текст ћелије према доле","Align table to the left":"Поравнајте табелу на леву страну","Center table":"Центар табеле","Align table to the right":"Поравнајте табелу на десну страну","The color is invalid. Try \"#FF0000\" or \"rgb(255,0,0)\" or \"red\".":"Боја је неважећа. Покушајте са \"#FF0000\" или \"rgb(255,0,0)\" или \"црвена\".","The value is invalid. Try \"10px\" or \"2em\" or simply \"2\".":"Вредност је неважећа. Покушајте са \"10px\" или \"2em\" или једноставно \"2\".","Enter table caption":"Унесите наслов табеле ","Keystrokes that can be used in a table cell":"Tasteri koji se mogu koristiti u ćeliji tabele","Move the selection to the next cell":"Pomeri odabir u sledeću ćeliju","Move the selection to the previous cell":"Pomeri odabir u prethodnu ćeliju","Insert a new table row (when in the last cell of a table)":"Umetni novi red u tabeli (kada je u poslednjoj ćeliji tabele)","Navigate through the table":"Kretanje kroz tabelu","Table":"Tabela","Styles":"Стилови","Multiple styles":"Више стилова","Block styles":"Блок стилови","Text styles":"Стилови текста","Special characters":"Специјални карактери","Category":"Kategorija","All":"Сви","Arrows":"Стрелице","Currency":"Валуте","Latin":"Латинични","Mathematical":"Maтематички","Text":"Текст","leftwards simple arrow":"једноставна стрелица налево","rightwards simple arrow":"једноставна стрелица удесно","upwards simple arrow":"једноставна стрелица нагоре","downwards simple arrow":"једноставна стрелица надоле","leftwards double arrow":"Дупла стрелица лево","rightwards double arrow":"Дупла стрелица десно","upwards double arrow":"Дупла стрелица према горе","downwards double arrow":"Дупла стрелица према доле","leftwards dashed arrow":"Прекидана стрелица лево","rightwards dashed arrow":"Прекидана стрелица десно","upwards dashed arrow":"Прекидана стрелица према горе","downwards dashed arrow":"Прекидана стрелица према доле","leftwards arrow to bar":"Стрелица налево ка траци","rightwards arrow to bar":"Стрелица надесно ка траци","upwards arrow to bar":"Стрелица према горе ка траци","downwards arrow to bar":"Стрелица према доле ка траци","up down arrow with base":"Стрелица на доле са базом","back with leftwards arrow above":"Назад са стрелицом лево","end with leftwards arrow above":"Завршите стрелицом лево","on with exclamation mark with left right arrow above":"Укључено са узвичником са стрелицомлево десно","soon with rightwards arrow above":"Ускоро са стрелицом надесно","top with upwards arrow above":"На врху са стрелицом према горе","Dollar sign":"Знак долара","Euro sign":"Знак еура","Yen sign":"Знак јена","Pound sign":"Знак фунти","Cent sign":"Знак цента","Euro-currency sign":"Знак валуте еура","Colon sign":"Двотачка","Cruzeiro sign":"Знак црузеиро","French franc sign":"Знак француског франака","Lira sign":"Знак лире","Currency sign":"Знак валуте","Bitcoin sign":"Знак биткиона","Mill sign":"Знак млна","Naira sign":"Знак наира","Peseta sign":"Знак пезета","Rupee sign":"Знак рупиа","Won sign":"Знак вон","New sheqel sign":"Знак нови шекел","Dong sign":"Знак донг","Kip sign":"Знак кип","Tugrik sign":"Знак тугрик","Drachma sign":"Знак драхма","German penny sign":"Знак немачки пени","Peso sign":"Знак песо","Guarani sign":"Знак гуарани","Austral sign":"Аустрални знак","Hryvnia sign":"Знак гривна","Cedi sign":"Знак цеди","Livre tournois sign":"Знак ливре тоурноис","Spesmilo sign":"Знак спесмилио","Tenge sign":"Знак тенге","Indian rupee sign":"Знак индијске рупије","Turkish lira sign":"Знак турских лира","Nordic mark sign":"Нордијски знак","Manat sign":"Знак манат","Ruble sign":"Знак рубле","Latin capital letter a with macron":"Латинско белико слово а са макроном","Latin small letter a with macron":"Латинско мало слово а са макроном","Latin capital letter a with breve":"Латинско велико слово а  са бревом ","Latin small letter a with breve":"Латинско мало слово а са бревом","Latin capital letter a with ogonek":"Латинско велико слово а са огонек","Latin small letter a with ogonek":"Латинско мало слово с са огонек","Latin capital letter c with acute":"Латинско велико слово ц са акутом","Latin small letter c with acute":"Латинско мало слово ц са акутом","Latin capital letter c with circumflex":"Латинско велико слово ц са цирцумфлекс","Latin small letter c with circumflex":"Латинско мало слово ц са цирцумфлекс","Latin capital letter c with dot above":"Латинско велико слово ц са тачком изнад","Latin small letter c with dot above":"Латинско мало слвово ц са тачком изнад","Latin capital letter c with caron":"Латинско велико слово ц са цароном","Latin small letter c with caron":"Латинско мало слово ц са цароном","Latin capital letter d with caron":"Латинско велико слово д са цароном","Latin small letter d with caron":"Латинско мало слово д са цароном","Latin capital letter d with stroke":"Латинско велико слово д са строке","Latin small letter d with stroke":"Латинско мало слово д са строке","Latin capital letter e with macron":"Латинско велико слово е са мацрон","Latin small letter e with macron":"Латинско мало слово е са мацрон","Latin capital letter e with breve":"Латинско велико слово е са бреве","Latin small letter e with breve":"Латинско мало слово е са бреве","Latin capital letter e with dot above":"Латинско велико слово е са тачком изнад","Latin small letter e with dot above":"Латинско мало слово е са тачком изнад","Latin capital letter e with ogonek":"Латинско велико слово е са огонек","Latin small letter e with ogonek":"Латинско мало слво е са огонек","Latin capital letter e with caron":"Латинско велико слово е са царон","Latin small letter e with caron":"Латинско мало слово е са царон","Latin capital letter g with circumflex":"Латинско велико слово г са цирцумфлекс","Latin small letter g with circumflex":"Латинско мало слобо г са цирцумфлекс","Latin capital letter g with breve":"Латинск велико слово г са бреве","Latin small letter g with breve":"Латинско мало слово г са бреве","Latin capital letter g with dot above":"Латинско велико слово г са тачком изнад","Latin small letter g with dot above":"Латинско мало слово г са тачком изнад","Latin capital letter g with cedilla":"Латинско велико слово г са цедилом","Latin small letter g with cedilla":"Латинско мало слово г са цедилом","Latin capital letter h with circumflex":"Латинско велико слово х са цирцумфлекс","Latin small letter h with circumflex":"Латинско мало слово х са цирцумфлекс","Latin capital letter h with stroke":"Латинско велико слово х са строке","Latin small letter h with stroke":"Латинско мало слово х са строке","Latin capital letter i with tilde":"Латинско велико слово и са тилдом","Latin small letter i with tilde":"Латинско мало слово и са тилдом","Latin capital letter i with macron":"Латинско велико слово и са мацрон","Latin small letter i with macron":"Латинско мало слово и са мацрон","Latin capital letter i with breve":"Латинско велико слово и са бреве","Latin small letter i with breve":"Латинско мало слово и са бреве","Latin capital letter i with ogonek":"Латинско велоко слово и са огонек","Latin small letter i with ogonek":"Латинско мало слово и са огонек","Latin capital letter i with dot above":"Латинско велико слово и са тачком изнад","Latin small letter dotless i":"Латинско мало слово и без тачке","Latin capital ligature ij":"Латинска велика лигатура иј","Latin small ligature ij":"Латинска мала лигатура иј","Latin capital letter j with circumflex":"Латинско велико слово ј са цирцумфлекс","Latin small letter j with circumflex":"Латнцско мало слово ј са цирцумфлекс","Latin capital letter k with cedilla":"Латинско велико слово к са цедила","Latin small letter k with cedilla":"Латинско мало слово к са цедила","Latin small letter kra":"Латинско мало слово кра","Latin capital letter l with acute":"Лаинско велико слово л са акутом","Latin small letter l with acute":"Латинско мало слово л са акутом","Latin capital letter l with cedilla":"Латинско велико слово л са цедила","Latin small letter l with cedilla":"Латинско мало слово л са цедила","Latin capital letter l with caron":"Латинско велико слово л са царон","Latin small letter l with caron":"Латинско мало слово л са царон","Latin capital letter l with middle dot":"Латинско велико слово л са среднјом тачком","Latin small letter l with middle dot":"Латинско мало слово са цреднјом тачком","Latin capital letter l with stroke":"Латинско велико слово л са строке","Latin small letter l with stroke":"Латинско мало слово л са строке","Latin capital letter n with acute":"Латинско влико слово н са акутом","Latin small letter n with acute":"Латинско мало слово н са  акутом","Latin capital letter n with cedilla":"Латинско велико слово н са цедилом","Latin small letter n with cedilla":"Латинско мало слово н са цедилом","Latin capital letter n with caron":"Латинско велико слово н са царон","Latin small letter n with caron":"Латинско мало слово н са царон","Latin small letter n preceded by apostrophe":"Латинско мало слово н које претходи апостроф","Latin capital letter eng":"Латинско велико слово енг","Latin small letter eng":"Латинско мало слово енг","Latin capital letter o with macron":"Латинско велико слово о са мацрон","Latin small letter o with macron":"Латинско мало слово о са марон","Latin capital letter o with breve":"Латинско велико слово о са бреве","Latin small letter o with breve":"Латинско мало слово о са бреве","Latin capital letter o with double acute":"Латинско велико слово о са двоструком акутом","Latin small letter o with double acute":"Латинско мало слово о са двоструком акутом","Latin capital ligature oe":"Латинска велика лигатура ое","Latin small ligature oe":"Латинска мала лигатура ое","Latin capital letter r with acute":"Латинско велико слово р са акутом","Latin small letter r with acute":"Латинско мало слово р са акутом","Latin capital letter r with cedilla":"Латинско велико слово р са цедила","Latin small letter r with cedilla":"Латинско мало слово р са цедила","Latin capital letter r with caron":"Латинско велико слово р са царон","Latin small letter r with caron":"Латинско мало слово р са царон","Latin capital letter s with acute":"Латинско велоко слово с са акутом","Latin small letter s with acute":"Латинско мало слово с са акутом","Latin capital letter s with circumflex":"Латинско велико слово с са цирцумфлекс","Latin small letter s with circumflex":"Латинско мало слово с са цирцумфлекс","Latin capital letter s with cedilla":"Латинско велико слово с са цедила","Latin small letter s with cedilla":"Латинско мало слово с са цедила","Latin capital letter s with caron":"Латинско велико слово с са царон","Latin small letter s with caron":"Латинско мало слово с са царон","Latin capital letter t with cedilla":"Латинско велико слово т са цедила","Latin small letter t with cedilla":"Латинско мало слово т са цедила","Latin capital letter t with caron":"Латинско велико слово т са царон","Latin small letter t with caron":"Латинско мало слово т са царон","Latin capital letter t with stroke":"Латинско велико слово т са строке","Latin small letter t with stroke":"Латинско мало слово т са строке","Latin capital letter u with tilde":"Латинско велико слово у са тилдом","Latin small letter u with tilde":"Латинско мало слово у са тилдом","Latin capital letter u with macron":"Латинско велико слово у са мацрон","Latin small letter u with macron":"Латинско мало слово у са мацрон","Latin capital letter u with breve":"Латинско велико слово у са бреве","Latin small letter u with breve":"Латинско мало слово у са бреве","Latin capital letter u with ring above":"Латинско велико слово у с престеном изнад","Latin small letter u with ring above":"Латинско мало слово у с прстеном изнад","Latin capital letter u with double acute":"Латинско велико слово у с двоструким акутом","Latin small letter u with double acute":"Латинско мало слово у с двоструким акутом","Latin capital letter u with ogonek":"Латинско велико слово у са огонек","Latin small letter u with ogonek":"Латинско мало слово у са огонек","Latin capital letter w with circumflex":"Латинско велико слово дупло в са цирцумфлекс","Latin small letter w with circumflex":"Латинско мало слово дупло в са цирцумфлекс","Latin capital letter y with circumflex":"Латинско велико слово ипсилон са цирцумфлекс","Latin small letter y with circumflex":"Латинско мало слово ипсилон са цирцумфлекс","Latin capital letter y with diaeresis":"Латинско велико слово ипсилон са дијарезом","Latin capital letter z with acute":"Латинско велико слово з са акутом","Latin small letter z with acute":"Латинско мало слово з са акутом","Latin capital letter z with dot above":"Латинско велико слово з са тачком изнад","Latin small letter z with dot above":"Латинско мало слово з са тачком изнад","Latin capital letter z with caron":"Латинско велико слово з са царон","Latin small letter z with caron":"Латинско мало слово з са царон","Latin small letter long s":"Латинско мало слово дугачко с","Less-than sign":"Знак мање од","Greater-than sign":"Знак веће од","Less-than or equal to":"Збак мање од или једнако","Greater-than or equal to":"Знак веће од или једнако","En dash":"Ен цртица","Em dash":"Ем цртица","Macron":"Мацрон","Overline":"Оверлине","Degree sign":"Знак степена","Minus sign":"Знак минус","Plus-minus sign":"Знак плус-минус","Division sign":"Знак дивизије","Fraction slash":"Црта фракције","Multiplication sign":"Знак множења","Latin small letter f with hook":"Латинско мало слово ф са куком","Integral":"Интеграл","N-ary summation":"Н-ари збир","Infinity":"Бесконачност","Square root":"Квадратни корен","Tilde operator":"Тилде оператор","Approximately equal to":"Отприлике једнако","Almost equal to":"Скоро једнако","Not equal to":"Неједнако са","Identical to":"Идентичан","Element of":"Елемент од","Not an element of":"Није елемент","Contains as member":"Садржи као члан","N-ary product":"Н-ари производ","Logical and":"Логички и","Logical or":"Локички или","Not sign":"Није знак","Intersection":"Раскрсница","Union":"Унија","Partial differential":"Делимични диференцијал","For all":"За све","There exists":"Постоји","Empty set":"Празан сет","Nabla":"Набла","Asterisk operator":"Астерикс оператор","Proportional to":"Сразмерно","Angle":"Угао","Vulgar fraction one quarter":"Вулгарна фракција једна четвртина","Vulgar fraction one half":"Вулгарна фракција једна половина","Vulgar fraction three quarters":"Вулгарна фрација три четвртине","Single left-pointing angle quotation mark":"Појединачни наводник угла левог показиванја","Single right-pointing angle quotation mark":"Појединачни наводник угла десног показивања","Left-pointing double angle quotation mark":"Леви двострани наводник двоструког угла ","Right-pointing double angle quotation mark":"Десни двострани наводик двоструког угла ","Left single quotation mark":"Леви појединачни наводник","Right single quotation mark":"Десни појединачни наводник","Left double quotation mark":"Леви двоструки наводник","Right double quotation mark":"Десни двоструки наводник","Single low-9 quotation mark":"Један ниски -9 наводник","Double low-9 quotation mark":"Двоструки ниски -9 наводник","Inverted exclamation mark":"Обрнути узвичник","Inverted question mark":"Обрнути упитник","Two dot leader":"Вођа са две тачке","Horizontal ellipsis":"Хоризонтална елипса","Double dagger":"Двоструки бодеж","Per mille sign":"Знак пер миле","Per ten thousand sign":"Знак за десет хиљада","Double exclamation mark":"Двоструки узвичник","Question exclamation mark":"Знак упитника узвичника","Exclamation question mark":"Знак узвичника упитника","Double question mark":"Двоструки упитник","Copyright sign":"Симбол ауторског права","Registered sign":"Регистровани знак","Trade mark sign":"Знак бренда","Section sign":"Знак селекција","Paragraph sign":"Знак параграф","Reversed paragraph sign":"Обрнути знак параграфа","Source":"Извор","Show source":"Pokaži izvor","Show blocks":"Prikaži blokove","Select all":"Означи све.","Disable editing":"Немогуће уређивање","Enable editing":"Омогући уређивање","Previous editable region":"Претходна регија за уређивање","Next editable region":"Следећа регија за уређивање","Navigate editable regions":"Пронђи регије за уређивање","Remove Format":"Уклони форматирање","Page break":"Прелом странице","media widget":"Медиа wидгет","Media URL":"Mедиа УРЛ","Paste the media URL in the input.":"Налепи медијски УРЛ у поље за унос","Tip: Paste the URL into the content to embed faster.":"Савет: Залепите УРЛ у садржај да би сте га брже уградили.","The URL must not be empty.":"УРЛ не сме бити празан.","This media URL is not supported.":"Овај медиа УРЛ тип није подржан.","Insert media":"Додај медиа","Media":"Medijski sadržaj","Media toolbar":"Медији трака са алаткама","Open media in new tab":"Отворите медије у новој картици","Numbered List":"Листа са бројевима","Bulleted List":"Набрајане листе","To-do List":"Листа обавеза","Bulleted list styles toolbar":"Трака са алаткама за набрајане листе","Numbered list styles toolbar":"Трака са алаткама за листе са бројевима","Toggle the disc list style":"Укључите / искључите стил листе дискова","Toggle the circle list style":"Укључи / искључи стил листе кругова","Toggle the square list style":"Укључи / искључи стил листе квадрата","Toggle the decimal list style":"Укључи / искључи стил декадне листе","Toggle the decimal with leading zero list style":"Пребаци децимални знак са водећим стилом листе нула","Toggle the lower–roman list style":"Укључите/ искључите стил доње римске листе","Toggle the upper–roman list style":"Укључите / искључите стил горње римске листе","Toggle the lower–latin list style":"Укључите / искључите стил доње листе латинице","Toggle the upper–latin list style":"Укључите / искључите стил горње листе латинице","Disc":"Диск","Circle":"Круг","Square":"Квадрат","Decimal":"Децимала","Decimal with leading zero":"Децимала са нулом на почетку","Lower–roman":"Доњи - римски","Upper-roman":"Горњи - римски","Lower-latin":"Доњи - латински","Upper-latin":"Горњи - латински","List properties":"Наведите својства ","Start at":"Почети у","Invalid start index value.":"Nevažeća vrednost početnog indeksa.","Start index must be greater than 0.":"Почетни индекс мора бити већи од 0. ","Reversed order":"Обрнути редослед ","Keystrokes that can be used in a list":"Tasteri koji se mogu koristiti na listi","Increase list item indent":"Povećaj uvlačenje liste stavki","Decrease list item indent":"Smanji uvlačenje liste stavki","Entering a to-do list":"Unošenje liste obaveza","Leaving a to-do list":"Ostavljanje liste obaveza","Unlink":"Отклони линк","Link":"Линк","Link URL":"УРЛ линк","Link URL must not be empty.":"URL linka ne sme biti prazan.","Link image":"Линк слике","Edit link":"Исправи линк","Open link in new tab":"Отвори линк у новом прозору","This link has no URL":"Линк не садржи УРЛ","Open in a new tab":"Отвори у новој картици","Downloadable":"Могуће преузимање","Create link":"Napravi vezu","Move out of a link":"Idi sa veze","Scroll to target":"Pomeraj do ciljne veze","Language":"Језик","Choose language":"Изабери језик","Remove language":"Одстрани језик","Increase indent":"Повећај увлачење","Decrease indent":"Смањи увлачење","image widget":"модул са сликом","Wrap text":"Преломити текст","Break text":"Прелом текста","In line":"У реду","Side image":"Бочна слика","Full size image":"Слика у пуној величини","Left aligned image":"Лева слика","Centered image":"Слика у средини","Right aligned image":"Десна слика","Change image text alternative":"Измена алтернативног текста","Text alternative":"Алтернативни текст","Enter image caption":"Одреди текст испод слике","Insert image":"Додај слику","Replace image":"Zameni sliku","Upload from computer":"Otpremi sa računara","Replace from computer":"Zameni sa računara","Upload image from computer":"Otpremi sliku sa računara","Image from computer":"Slika sa računara","From computer":"Sa računara","Replace image from computer":"Zameni sliku sa računara","Upload failed":"Постављање неуспешно","You have no image upload permissions.":"Nemate dozvole za otpremanje slike.","Image toolbar":"Слика трака са алтакама","Resize image":"Промените величину слике","Resize image to %0":"Промените величину слике на% 0","Resize image to the original size":"Промените величину слике до оригиналне величине","Resize image (in %0)":"Promenite veličinu slike (u %0)","Original":"Оригинал","Custom image size":"Prilagođena veličina slike","Custom":"Prilagođeno","Image resize list":"Листа величине слике","Insert image via URL":"Убаци слику преко УРЛ-а","Insert via URL":"Umetni putem URL adrese","Image via URL":"Slika putem URL adrese","Via URL":"Putem URL adrese","Update image URL":"Ажурирај УРЛ слике","Caption for the image":"Натпис за слику","Caption for image: %0":"Натпис за слику: %0","The value must not be empty.":"Vrednost ne sme biti prazna.","The value should be a plain number.":"Vrednost treba da bude običan broj.","Uploading image":"Otpremanje slike","Image upload complete":"Otpremanje slike je završeno","Error during image upload":"Greška tokom otpremanja slike","Image":"Slika","HTML object":"ХТМЛ објекат ","Insert HTML":"Уметни ХТМЛ","HTML snippet":"ХТМЛ део","Paste raw HTML here...":"Овде налепите ХТМЛ","Edit source":"Уреди извор","Save changes":"Сачувај измене","No preview available":"Приказ није доступан","Empty snippet content":"Садрћај празног исечка","Horizontal line":"Хоризонтална разделна линија","Yellow marker":"Жути маркер","Green marker":"Зелени маркер","Pink marker":"Роза маркер","Blue marker":"Плави маркер","Red pen":"Црвена оловка","Green pen":"Зелена оловка","Remove highlight":"Уклони истицање","Highlight":"Истицање","Text highlight toolbar":"Алатке за маркирање текста","Heading":"Стилови","Choose heading":"Одреди стил","Heading 1":"Наслов 1","Heading 2":"Наслов 2","Heading 3":"Наслов 3","Heading 4":"Наслов 4","Heading 5":"Наслов 5","Heading 6":"Наслов 6","Type your title":"Одредите наслов","Type or paste your content here.":"Упишите или налепите наслов","Font Size":"Величина фонта","Tiny":"Ситно","Small":"Мало","Big":"Велико","Huge":"Огромно","Font Family":"Фонт","Default":"Основни","Font Color":"Боја слова","Font Background Color":"Боја позадине слова","Document colors":"Боје документа","Find and replace":"Нађи и замени","Find in text…":"Пронађи у тексту… ","Find":"Пронаћи","Previous result":"Претходни резултат ","Next result":"Следећи резултат ","Replace":"Замени","Replace all":"Замени све","Match case":"Подударање случај ","Whole words only":"Само целе речи ","Replace with…":"Замени са…","Text to find must not be empty.":"Текст за проналажење не сме бити празан.","Tip: Find some text first in order to replace it.":"Савет: Прво пронађите неки текст да бисте га заменили. ","Advanced options":"Napredne opcije","Find in the document":"Nađi u dokumentu","Insert a soft break (a <code>&lt;br&gt;</code> element)":"Umetni blagi prekid (<code>&lt;br&gt;</code> element)","Insert a hard break (a new paragraph)":"Umetni jači prekid (novi pasus)","Cancel":"Одустани","Clear":"Obriši","Remove color":"Отклони боју","Restore default":"Врати подразумевано","Save":"Сачувај","Show more items":"Прикажи још ставки","%0 of %1":"%0 of %1","Cannot upload file:":"Постављање фајла је неуспешно:","Rich Text Editor. Editing area: %0":"Уређивач обогаћеног текста.Простор за уређивање: %0","Insert with file manager":"Ubaci pomoću menadžera datoteka","Replace with file manager":"Zameni pomoću menadžera datoteka","Insert image with file manager":"Ubaci sliku pomoću menadžera datoteka","Replace image with file manager":"Zameni sliku pomoću menadžera datoteka","File":"Datoteka","With file manager":"Putem menadžera datoteka","Toggle caption off":"Искључивање натписа ","Toggle caption on":"Укључите наслов ","Content editing keystrokes":"Tasteri za uređivanje sadržaja","These keyboard shortcuts allow for quick access to content editing features.":"Ove prečice na tastaturi omogućavaju brz pristup funkcijama za uređivanje sadržaja.","User interface and content navigation keystrokes":"Korisnički interfejs i tasteri za navigaciju sadržaja","Use the following keystrokes for more efficient navigation in the CKEditor 5 user interface.":"Koristite sledeće tastere za efikasniju navigaciju u korisničkom interfejsu CKEditor 5.","Close contextual balloons, dropdowns, and dialogs":"Zatvori kontekstualne prozore, padajuće menije i dijaloge","Open the accessibility help dialog":"Otvori dijalog za pomoć oko pristupačnosti","Move focus between form fields (inputs, buttons, etc.)":"Pomeraj fokus između polja za tekst (unosi, tasteri, itd.)","Move focus to the menu bar, navigate between menu bars":"Pomerite fokus na traku menija, navigirajte između traka menija","Move focus to the toolbar, navigate between toolbars":"Pomeri fokus na traku sa alatkama, kreći se kroz traku sa alatkama","Navigate through the toolbar or menu bar":"Krećite se kroz traku sa alatkama ili traku menija","Execute the currently focused button. Executing buttons that interact with the editor content moves the focus back to the content.":"Izvršite trenutno fokusirano dugme. Izvršavanje dugmadi koja su u interakciji sa sadržajem uređivača pomera fokus nazad na sadržaj.","Accept":"Prihvati","Paragraph":"Пасус","Color picker":"Бирач боја","Insert code block":"Додај блок кода","Plain text":"Обичан текст","Leaving %0 code snippet":"Ostavljanje %0 isečka koda","Entering %0 code snippet":"Unošenje %0 isečka koda","Entering code snippet":"Unošenje isečka koda","Leaving code snippet":"Ostavljanje isečka koda","Code block":"Blok koda","Copy selected content":"Kopiraj odabrani sadržaj","Paste content":"Nalepi sadržaj","Paste content as plain text":"Nalepi sadržaj kao običan tekst","Insert image or file":"Додај слику или фајл","Could not obtain resized image URL.":"УРЛ слика промењених димензија није доступна.","Selecting resized image failed":"Одабир слике промењених дименшија није успешно","Could not insert image at the current position.":"Немогуће је додати слику на ово место.","Inserting image failed":"Додавање слике је неуспешно","Open file manager":"Oтвори управљач датотекама.","Cannot determine a category for the uploaded file.":"Није могуће одредити категорију за отпремлјену датотеку.","Cannot access default workspace.":"Nije moguće pristupiti podrazumevanom radnom prostoru.","You have no image editing permissions.":"Nemate dozvole za uređivanje slike.","Edit image":"Uredi sliku","Processing the edited image.":"Obrađivanje uređene slike.","Server failed to process the image.":"Server nije uspeo da obradi sliku.","Failed to determine category of edited image.":"Određivanje kategorije uređene slike nije uspelo.","Bookmark":"Obeleživač","Insert":"Umetni","Update":"Ažuriraj","Edit bookmark":"Uredi obeleživač","Remove bookmark":"Ukloni obeleživač","Bookmark name":"Naziv obeleživača","Enter the bookmark name without spaces.":"Unesite naziv obeleživača bez razmaka.","Bookmark must not be empty.":"Naziv obeleživača ne sme biti prazan.","Bookmark name cannot contain space characters.":"Naziv obeleživača ne može da sadrži znakove sa razmakom.","Bookmark name already exists.":"Naziv obeleživača već postoji.","bookmark widget":"vidžet obeleživača","Block quote":"Цитат","Bold":"Подебљано","Italic":"Курзив","Underline":"Подвучен","Code":"Код","Strikethrough":"Прецртан","Subscript":"Индекс доле","Superscript":"Индекс горе","Italic text":"Tekst u kurzivu","Move out of an inline code style":"Izađi iz inline stila","Bold text":"Podebljan tekst","Underline text":"Podvučen tekst","Strikethrough text":"Precrtan tekst","Saving changes":"Сачувај измене","Revert autoformatting action":"Vrati na automatsko formatiranje","Align left":"Лево равнање","Align right":"Десно равнање","Align center":"Централно равнанје","Justify":"Обострано равнање","Text alignment":"Равнање текста","Text alignment toolbar":"Алатке за равнање текста"},getPluralForm(n){return (n % 10 == 1 && n % 100 != 11 ? 0 : n % 10 >= 2 && n % 10 <= 4 && (n % 100 < 10 || n % 100 >= 20) ? 1 : 2);}}};
e[ 'sr' ] ||= { dictionary: {}, getPluralForm: null };
e[ 'sr' ].dictionary = Object.assign( e[ 'sr' ].dictionary, dictionary );
e[ 'sr' ].getPluralForm = getPluralForm;
} )( window.CKEDITOR_TRANSLATIONS ||= {} );
