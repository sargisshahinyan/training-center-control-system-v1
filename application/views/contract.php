<?php
/**
 * Created by IntelliJ IDEA.
 * User: shahi
 * Date: 2/5/2018
 * Time: 4:34 PM
 */
function getMonth($m) {
	switch ($m) {
		case '01':
			return 'հունվար';
			break;
		case '02':
			return 'փետրվար';
			break;
		case '03':
			return 'մարտ';
			break;
		case '04':
			return 'ապրիլ';
			break;
		case '05':
			return 'մայիս';
			break;
		case '06':
			return 'հունիս';
			break;
		case '07':
			return 'հուլիս';
			break;
		case '08':
			return 'օգօստոս';
			break;
		case '09':
			return 'սեպտեմբեր';
			break;
		case '10':
			return 'հոկտեմբեր';
			break;
		case '11':
			return 'նոյեմբեր';
			break;
		case '12':
			return 'դեկտեմբեր';
			break;
		default:
			return '';
	}
}

$month = getMonth(date('m', strtotime($student['registrationDate'])));
$endMonth = getMonth(date('m', strtotime('+6 month', strtotime($student['registrationDate']))));
?>
<script>
	$("link").remove();
</script>
<div style="line-height: 1.435; text-align: justify;">
	<div>
		<p align="right">
			N <?= date('mdy', strtotime($student['registrationDate'])) . ucfirst($student['surname'][0]) . ucfirst($student['name'][0]) ?>
		</p>
		<p align="center">
			<strong>ԾԱՌԱՅՈՒԹՅՈՒՆՆԵՐԻ</strong>
			<strong> </strong>
			<strong>ՎՃԱՐՈՎԻ</strong>
			<strong> </strong>
			<strong>ՄԱՏՈՒՑՄԱՆ</strong>
			<strong> </strong>
		</p>
		<p align="center">
			<strong>ՊԱՅՄԱՆԱԳԻՐ</strong>
			<strong></strong>
		</p>
		<p>
			ք.Երևան «<?= date('d', strtotime($student['registrationDate'])) ?>» <u><?= $month ?></u> <?= date('Y', strtotime($student['registrationDate'])) ?>թ.
		</p>
		<p>
			<em><u><?= ucfirst($student['name']) ?> <?= ucfirst($student['middlename'])?> <?= ucfirst($student['surname'])?>ը</u></em>
			(անձ. <u><?= $student['passport'] ?></u>, տրվ. <u><?= date('d.m.Y', strtotime($student['passportDate'])) ?></u>, <u><?= $student['passportFrom'] ?></u>-ի
			կողմից), այսուհետ`Պատվիրատու, մի կողմից, և <?= $student['branchName'] ?>,
			(իրավաբանական հասցեն` <?= $student['branchAddress'] ?>, <?= $student['addressInfo'] ?>),
			այսուհետ`Կատարող, ի դեմս տնօրեն <?= $student['head'] ?>ի (<?= $student['headPassport'] ?>,
			տրվ. <?= date('d.m.Y', strtotime($student['headPassportDate'])); ?>թ., <?= $student['headPassportFrom'] ?>-ի կողմից), որը գործում է կանոնադրության հիման
			վրա, մյուս կողմից, կնքեցին սույն պայմանագիրը հետևյալի մասին.
		</p>
		<p>
			<strong><em>1. </em></strong>
			<strong><em>Պայմանագրի</em></strong>
			<strong><em> </em></strong>
			<strong><em>առարկան</em></strong>
			<strong><em></em></strong>
		</p>
		<p>
			1.1. Սույն պայմանագրով` Կատարողը պարտավորվում է Պատվիրատուի
			հանձնարարությամբ մատուցել սույն պայմանագրի 1.2 կետում նշված
			ծառայությունները, իսկ Պատվիրատուն պարտավորվում է վճարել այդ
			ծառայությունների համար:
		</p>
		<p>
			1.2. Կատարողը պարտավորվում է մատուցել հետևյալ ծառայությունները`վեբ
			(web) ծրագրավորման ուսումնական պլանի ուսուցում բաղկացած հետևյալ
			բաժիններից.
		</p>
		<ul>
			<li>
				HTML
			</li>
			<li>
				CSS
			</li>
			<li>
				Responsive design, Bootstrap
			</li>
			<li>
				JavaScript, jQuery
			</li>
			<li>
				PHP / OOP
			</li>
			<li>
				MySQL
			</li>
			<li>
				MVC, Codeigniter
			</li>
		</ul>
		<p>
			այսուհետ`Ծառայություններ:
		</p>
		<p>
			1.3. Ծառայությունների մատուցման ժամկետն է` &lt;&lt;<?= date('d', strtotime($student['registrationDate'])) ?>&gt;&gt; <u><?= $month ?> <?= date('Y', strtotime($student['registrationDate'])) ?></u>թ.
			մինչև &lt;&lt;<?= date('d', strtotime('+6 month', strtotime($student['registrationDate']))) ?>&gt;&gt; <u><?= $endMonth ?> <?= date('Y', strtotime('+6 month', strtotime($student['registrationDate']))) ?></u>թ.: Կատարողն իրավունք ունի ծառայությունների մատուցումն
			ավարտել ժամկետից շուտ:
		</p>
		<p>
			1.3.1. Ծառայությունները մատուցվում են դասընթացներ կազմակերպելու
			միջոցով, որոնք իրականացվում են խմբակային կարգով (յուրաքանչյուր խմբում
			ընդգրկվում է առավելագույնը 6 անձ), շաբաթը 3 օր, յուրաքանչյուր դասը 120
			րոպե տևողությամբ:
		</p>
		<p>
			1.3.2. Ծառայությունների մատուցումն ավարտված է համարվում Պատվիրատուի և
			Կատարողի կամ նրանց լիազոր ներկայացուցիչների կողմից հանձնման – ընդունման
			ակտի ստորագրման պահից:
		</p>
		<p>
			<strong><em>2. </em></strong>
			<strong><em>Կողմերի</em></strong>
			<strong><em> </em></strong>
			<strong><em>իրավունքներն</em></strong>
			<strong><em> </em></strong>
			<strong><em>ու</em></strong>
			<strong><em> </em></strong>
			<strong><em>պարտականությունները</em></strong>
			<strong><em></em></strong>
		</p>
		<p>
			2.1 Կատարողը պարտավոր է`
		</p>
		<p>
			2.1.1. Ծառայությունն իրականացնել պատշաճ որակով.
		</p>
		<p>
			2.1.2. Ծառայությունը մատուցել ամբողջ ծավալով սույն պայմանագրի 1.3
			կետում նշված ժամկետներում.
		</p>
		<p>
			2.1.3. Պատվիրատուի պահանջով 3 օրվա ընթացքում անհատույց վերացնել
			հայտնաբերված թերությունները.
		</p>
		<p>
			2.2 Կատարողն իրավունք ունի`
		</p>
		<p>
			2.2.1. Պատվիրատուից պահանջել ժամանակին և լրիվ չափով վճարել
			ծառայությունների համար սույն պայմանագրի 3-րդ կետի պահանջներին
			համապատասխան.
		</p>
		<p>
			2.2.2. Պատվիրատուից պահանջել սահմանված ժամանակին ներկա գտնվել
			դասընթացներին:
		</p>
		<p>
			2.2.3. Պատվիրատուի` դասընթացներից 3 և ավելի անգամ անհարգելի բացակայելու
			դեպքում միակողմանի լուծել պայմանագիրը առանց մինչև այդ պահը Պատվիրատուի
			կողմից կատարված վճարումները վերադարձնելու:
		</p>
		<p>
			2.3. Պատվիրատուն պարտավոր է`
		</p>
		<p>
			2.3.1. Մատուցված ծառայությունների դիմաց վճարել սույն պայմանագրի 3-րդ
			կետի պահանջներին համապատասխան:
		</p>
		<p>
			2.3.2. Պատշաճ կարգով և ժամանակին ներկայանալ պայմանագրով նախատեսված
			դասընթացներին: Կատարողը պարտավորություն չի կրում բաց թողնված
			դասընթացների լրացման համար, բացառությամբ ծայրահեղ դեպքերի, երբ
			Պատվիրատուն ապացուցում է բացակայության հարգելի լինելու փաստը:
		</p>
		<p>
			2.3.4. Իր նախաձեռնությամբ սույն պայմանագրի վաղաժամկետ լուծման դեպքում
			հրաժարվել ուսման համար կատարված նախավճարից և ընթացիկ ամսվա համար
			կատարված վճարից:
		</p>
		<p>
			2.4. Պատվիրատուն իրավունք ունի.
		</p>
		<p>
			2.4.1. Ցանկացած ժամանակ ստուգել Կատարողի Ծառայությունների ընթացքը և
			որակը` առանց միջամտելու նրա գործունեությանը:
		</p>
		<p>
			2.4.2. Մինչև ակտի ստորագրումը` ցանկացած ժամանակ հրաժարվել պայմանագիրը
			կատարելուց` Կատարողին վճարելով ընթացիկ ամսվա ամբողջ վճարը:
		</p>
		<br>
		<p>
			<strong><em>3. </em></strong>
			<strong><em>Պայմանագրի</em></strong>
			<strong><em> </em></strong>
			<strong><em>գինը</em></strong>
			<strong><em> </em></strong>
			<strong><em>և</em></strong>
			<strong><em> </em></strong>
			<strong><em>վճարման</em></strong>
			<strong><em> </em></strong>
			<strong><em>կարգը</em></strong>
			<strong></strong>
		</p>
		<p>
			3.1. Մինչև Ծառայությունների մատուցման ավարտը Պատվիրատուն կատարում է
			ուսուցման ամենամսյա վճար <u>30000</u> (<u>երեսուն</u><u> </u>        <u>հազար</u>) ՀՀ դրամի չափով:
		</p>
		<p>
			3.2 Վճարումները կատարվում են փոխանցումով: Պայմանագիրը կնքելուց հետո 3
			օրվա ընթացքում պատվիրատուի կողմից միանվագ վճարվում է նախավճար մեկ ամսվա
			վճարի չափով:
		</p>
		<p>
			3.3. Պատվիրատուի կողմից Կատարողին պայմանագրային գինը վճարվում է սույն
			պայմանագրում նշված Կատարողի հաշվարկային հաշվին փոխանցելու միջոցով:
		</p>
		<p>
			<strong><em>4. </em></strong>
			<strong><em>Անհաղթահարելի</em></strong>
			<strong><em> </em></strong>
			<strong><em>ուժի</em></strong>
			<strong><em> </em></strong>
			<strong><em>ազդեցությունը</em></strong>
			<strong><em> (</em></strong>
			<strong><em>ֆորս</em></strong>
			<strong><em>-</em></strong>
			<strong><em>մաժոր</em></strong>
			<strong><em>)</em></strong>
			<strong><em></em></strong>
		</p>
		<p>
			4.1 Սույն պայմանագրով պարտավորություններն ամբողջությամբ կամ մասնակիորեն
			չկատարելու դեպքում կողմերն ազատվում են պատասխանատվությունից, եթե դա
			եղել է անհաղթահարելի ուժի ազդեցության արդյունք, որը ծագել է սույն
			պայմանագիրը կնքելուց հետո, և որը կողմերը չէին կարող կանխատեսել կամ
			կանխարգելել: Այդպիսի իրավիճակներ են` երկրաշարժը, հրդեհը, պատերազմը,
			ռազմական և արտակարգ դրություն հայտարարելը, քաղաքական հուզումները,
			համազգային գործադուլները, հաղորդակցության միջոցների աշխատանքի
			դադարեցումը և այլ իրավիճակներ, որոնք անհնար են դարձնում սույն
			պայմանագրով պարտավորությունների կատարումը:
		</p>
		<p>
			<strong><em>5. </em></strong>
			<strong><em>Եզրափակիչ</em></strong>
			<strong><em> </em></strong>
			<strong><em>դրույթներ</em></strong>
			<strong><em></em></strong>
		</p>
		<p>
			5.1 Պայմանագիրը կարող է փոփոխվել կամ լրացվել կողմերի համաձայնությամբ:
		</p>
		<p>
			5.2 Սույն պայմանագրի կապակցությամբ ծագած խնդիրները լուծվում են
			երկկողմանի
		</p>
		<p>
			բանակցությունների միջոցով:
		</p>
		<p>
			5.3 Պայմանագրի շուրջ ծագած վեճերը սույն պայմանագրի 5.1 կետի համաձայն
		</p>
		<p>
			չլուծվելու դեպքում ենթակա են լուծման դատական կարգով ՀՀ գործող
			օրենսդրությամբ
		</p>
		<p>
			սահմանված կարգով:
		</p>
		<p>
			5.4 Սույն պայմանագիրը կնքված է հավասարազոր իրավաբանական ուժ հանդիսացող
		</p>
		<p>
			հայերեն լեզվով գրված 2 /երկու/ օրինակից: Յուրաքանչյուր կողմի մոտ
			գտնվում է
		</p>
		<p>
			պայմանագրի մեկ օրինակ:
		</p>
		<p>
			5.5 Պայմանագիրն ուժի մեջ է մտնում ստորագրման պահից:
		</p>
		<br><br>
		<p>
			<strong><em>6. </em></strong>
			<strong><em>Կողմերի</em></strong>
			<strong><em> </em></strong>
			<strong><em>հասցեները</em></strong>
			<strong><em>, </em></strong>
			<strong><em>բանկային</em></strong>
			<strong><em> </em></strong>
			<strong><em>վավերապայմանները</em></strong>
			<strong><em> </em></strong>
			<strong><em>և</em></strong>
			<strong><em> </em></strong>
			<strong><em>ստորագրությունները</em></strong>
			<strong><em></em></strong>
		</p>
	</div>
	<br clear="all"/>
	<div style="width: calc(50% - 10px); float: left; padding: 0 5px">
		<div style="width: 40%; float: left">
			<p>
				<strong>Պատվիրատու`</strong>
			</p>
			<p>
				Ա. Ա.
			</p>
			<p>
				<?= explode(' ', $student['passport'])[0] ?>
			</p>
			<p>
				Հասցե
			</p>
			<p>
				Հեռ.
			</p>
		</div>
		<div style="width: 60%; float: left">
			<p>
				<strong style="color: white">.</strong>
			</p>
			<p>
				<u><?= ucfirst($student['name']) ?></u><u> </u><u><?= ucfirst($student['surname']) ?></u>
			</p>
			<p>
				<u><?= explode(' ', $student['passport'])[0] ?></u>
			</p>
			<p>
				<u><?= $student['address'] ?></u>
			</p>
			<p>
				<u><?= $student['firstPhone'] ?></u>
			</p>
			<p>
				<u>________________</u>
			</p>
			<p>
				(ստորագրություն)
			</p>
		</div>
		<br clear="all">
	</div>
	<div style="width: calc(50% - 10px); float: left; padding: 0 5px">
		<div style="width: 40%; float: left">
			<p>
				<strong>Կատարող`</strong>
			</p>
			<p>
				Անվանում
			</p>
			<p>
				ՀՎՀՀ
			</p>
			<p>
				Հասցե
			</p>
			<p>
				Բանկ
			</p>
			<p>
				Հ/Հ
			</p>
			<p>
				Հեռ.
			</p>
			<p>
				Տնօրեն`
			</p>
			<p>
				Կ.Տ.
			</p>
		</div>
		<div style="width: 60%; float: left">
			<p>
				<strong style="color: #ffffff;">.</strong>
			</p>
			<p>
				<?= $student['branchName'] ?>
			</p>
			<p>
				<?= $student['HVHH'] ?>
			</p>
			<p>
				<?= $student['branchAddress'] ?>
			</p>
			<p>
				<?= $student['bank'] ?>
			</p>
			<p>
				<?= $student['account'] ?>
			</p>
			<p>
				<?= $student['phone'] ?>
			</p>
			<p>
				<?= mb_substr(explode(' ', $student['head'])[0], 0, 1) . '. ' . explode(' ', $student['head'])[1] ?>
			</p>
		</div>
		<br clear="all">
	</div>
	<br clear="all"/>
</div>
