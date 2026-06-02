const typeArr = [
    {0:'普　通,g', 1:'普通'},
    {0:'快　速,n', 1:'快速'},
    {0:'新快速,r', 1:'新快速'},
    {0:'特　急,r', 1:'特急'},
    {0:'回　送,n', 1:'回送'},
    {0:'通　過,n', 1:'通過'},
    {0:'　　　,n', 1:'空欄'}
]

const rideposArr1 = [
    { 0: '白△', 1:'白△'},
    { 0: '黄↑', 1:'黄↑'},
    { 0: '白○', 1:'白○'}
]

const rideposArr2 = [
    {0:'１～12', 1:'1～12'},
    {0:'１～10', 1:'1～10'},
    {0:'２～11', 1:'2～11'},
    {0:'３～12', 1:'3～12'},
    {0:'１～８', 1:'1～8'},
    {0:'３～10', 1:'3～10'},
    {0:'５～12', 1:'5～12'},
    {0:'１～７', 1:'1～7'},
    {0:'１～６', 1:'1～6'},
    {0:'３～８', 1:'3～8'},
    {0:'５～10', 1:'5～10'},
    {0:'７～12', 1:'7～12'}
]

const destinationArr = [
    { 0: ' 大　阪 ', 1: '大阪' },
    { 0: ' 新大阪 ', 1: '新大阪' },
    { 0: ' 高　槻 ', 1: '高槻' },
    { 0: ' 京　都 ', 1: '京都' },
    { 0: ' 大　津 ', 1: '大津' },
    { 0: ' 長　浜 ', 1: '長浜' },
    { 0: ' 西　宮 ', 1: '西宮' },
    { 0: ' 神　戸 ', 1: '神戸' },
    { 0: ' 西明石 ', 1: '西明石' },
    { 0: ' 姫　路 ', 1: '姫路' },
    { 0: ' 新三田 ', 1: '新三田' },
    { 0: ' 谷　川 ', 1: '谷川' },
    { 0: ' 福知山 ', 1: '福知山' },
    { 0: ' 宮　津 ', 1: '宮津' },
    { 0: ' 和田山 ', 1: '和田山' },
    { 0: ' 天王寺 ', 1: '天王寺' },
    { 0: '和泉府中', 1: '和泉府中' },
    { 0: '関西空港', 1: '関西空港' },
    { 0: ' 海　南 ', 1: '海南' },
    { 0: ' 白　浜 ', 1: '白浜' },
    { 0: ' 新　宮 ', 1: '新宮' },
    { 0: ' 王　寺 ', 1: '王寺' },
    { 0: ' 奈　良 ', 1: '奈良' },
    { 0: ' 高　田 ', 1: '高田' },
    { 0: ' 木　津 ', 1: '木津' },
    { 0: '松井山手', 1: '松井山手' },
    { 0: ' 岡　山 ', 1: '岡山' },
    { 0: ' 宇　野 ', 1: '宇野' },
    { 0: ' 福　山 ', 1: '福山' },
    { 0: ' 三　原 ', 1: '三原' },
    { 0: ' 広　島 ', 1: '広島' },
    { 0: ' 宮島口 ', 1: '宮島口' },
    { 0: ' 新山口 ', 1: '新山口' },
    { 0: ' 下　関 ', 1: '下関' },
    { 0: ' 松　江 ', 1: '松江' },
    { 0: ' 浜　田 ', 1: '浜田' },
    { 0: ' 高　松 ', 1: '高松' },
    { 0: ' 松　山 ', 1: '松山' },
    { 0: ' 宇和島 ', 1: '宇和島' },
    { 0: ' 長　崎 ', 1: '長崎' },
    { 0: ' 中　津 ', 1: '中津' },
    { 0: ' 大　分 ', 1: '大分' },
    { 0: ' 宮　崎 ', 1: '宮崎' },
    { 0: ' 福　井 ', 1: '福井' },
    { 0: ' 小　松 ', 1: '小松' },
    { 0: ' 金　沢 ', 1: '金沢' },
    { 0: ' 高　岡 ', 1: '高岡' },
    { 0: ' 七　尾 ', 1: '七尾' },
    { 0: ' 長　岡 ', 1: '長岡' },
    { 0: ' 新発田 ', 1: '新発田' },
    { 0: ' 村　上 ', 1: '村上' },
    { 0: ' 秋　田 ', 1: '秋田' },
    { 0: ' 高　山 ', 1: '高山' },
    { 0: ' 名古屋 ', 1: '名古屋' },
    { 0: ' 春日井 ', 1: '春日井' },
    { 0: ' 中津川 ', 1: '中津川' },
    { 0: ' 浜　松 ', 1: '浜松' },
    { 0: ' 松　本 ', 1: '松本' },
    { 0: ' 長　野 ', 1: '長野' },
    { 0: ' 小田原 ', 1: '小田原' },
    { 0: ' 東　京 ', 1: '東京' },
    { 0: ' 上　野 ', 1: '上野' },
    { 0: ' 大　宮 ', 1: '大宮' },
    { 0: ' 小　山 ', 1: '小山' },
    { 0: ' 宇都宮 ', 1: '宇都宮' },
    { 0: ' 高　崎 ', 1: '高崎' },
    { 0: ' 水　戸 ', 1: '水戸' },
    { 0: ' いわき ', 1: 'いわき' },
    { 0: ' 八　戸 ', 1: '八戸' }
]

const type1 = document.getElementById("type1");
const ridepos1 = document.getElementById("ridepos1");
const ridepos1num = document.getElementById("ridepos1num");
const time1h = document.getElementById("time1h");
const time1m = document.getElementById("time1m");
const destination1 = document.getElementById("destination1");
const behind1t = document.getElementById("behind1t");
const behind1f = document.getElementById("behind1f");
const behind1time = document.getElementById("behind1time");

const type2 = document.getElementById("type2");
const ridepos2 = document.getElementById("ridepos2");
const ridepos2num = document.getElementById("ridepos2num");
const time2h = document.getElementById("time2h");
const time2m = document.getElementById("time2m");
const destination2 = document.getElementById("destination2");
const behind2t = document.getElementById("behind2t");
const behind2f = document.getElementById("behind2f");
const behind2time = document.getElementById("behind2time");

const type3 = document.getElementById("type3");
const ridepos3 = document.getElementById("ridepos3");
const ridepos3num = document.getElementById("ridepos3num");
const time3h = document.getElementById("time3h");
const time3m = document.getElementById("time3m");
const destination3 = document.getElementById("destination3");
const behind3t = document.getElementById("behind3t");
const behind3f = document.getElementById("behind3f");
const behind3time = document.getElementById("behind3time");

const type4 = document.getElementById("type4");
const ridepos4 = document.getElementById("ridepos4");
const ridepos4num = document.getElementById("ridepos4num");
const time4h = document.getElementById("time4h");
const time4m = document.getElementById("time4m");
const destination4 = document.getElementById("destination4");
const behind4t = document.getElementById("behind4t");
const behind4f = document.getElementById("behind4f");
const behind4time = document.getElementById("behind4time");

/* 1列車目 */
for(var i1 = 0; i1 < typeArr.length; i1++){
    if(typeArr[i1][0] == document.getElementById(`type1_js`).innerHTML){
        type1.innerHTML += `<option value="${typeArr[i1][0]}" selected>${typeArr[i1][1]}</option>`;
    }else{
        type1.innerHTML += `<option value="${typeArr[i1][0]}">${typeArr[i1][1]}</option>`;
    }/**/
}
for(var i1 = 0; i1 < rideposArr1.length; i1++){
    if(document.getElementById(`ridepos1_js`)){
        if(rideposArr1[i1][0] == document.getElementById(`ridepos1_js`).innerHTML){
            ridepos1.innerHTML += `<option value="${rideposArr1[i1][0]}" selected>${rideposArr1[i1][1]}</option>`;
        }else{
            ridepos1.innerHTML += `<option value="${rideposArr1[i1][0]}">${rideposArr1[i1][1]}</option>`;
        }
    }else{
        ridepos1.disabled = true;
    }
}
for(var i1 = 0; i1 < rideposArr2.length; i1++){
    if(document.getElementById(`ridepos1num_js`)){
        if(rideposArr2[i1][0] == document.getElementById(`ridepos1num_js`).innerHTML){
            ridepos1num.innerHTML += `<option value="${rideposArr2[i1][0]}" selected>${rideposArr2[i1][1]}</option>`;
        }else{
            ridepos1num.innerHTML += `<option value="${rideposArr2[i1][0]}">${rideposArr2[i1][1]}</option>`;
        }
    }else{
        ridepos1num.disabled = true;
    }
}
for(var i1 = 0; i1 < destinationArr.length; i1++){
    if(document.getElementById(`destination1_js`)){
        if(destinationArr[i1][0] == document.getElementById(`destination1_js`).innerHTML){
            destination1.innerHTML += `<option value="${destinationArr[i1][0]}" selected>${destinationArr[i1][1]}</option>`;
        }else{
            destination1.innerHTML += `<option value="${destinationArr[i1][0]}">${destinationArr[i1][1]}</option>`;
        }
    }else{
        destination1.disabled = true;
    }
}
time1h.value = document.getElementById(`time1h_js`) ? document.getElementById(`time1h_js`).innerHTML : "";
time1h.disabled = document.getElementById(`time1h_js`) ? false : true;
time1m.value = document.getElementById(`time1m_js`) ? document.getElementById(`time1m_js`).innerHTML : "";
time1m.disabled = document.getElementById(`time1m_js`) ? false : true;

/* 2列車目 */
for(var i1 = 0; i1 < typeArr.length; i1++){
    if(typeArr[i1][0] == document.getElementById(`type2_js`).innerHTML){
        type2.innerHTML += `<option value="${typeArr[i1][0]}" selected>${typeArr[i1][1]}</option>`;
    }else{
        type2.innerHTML += `<option value="${typeArr[i1][0]}">${typeArr[i1][1]}</option>`;
    }/**/
}
for(var i1 = 0; i1 < rideposArr1.length; i1++){
    if(document.getElementById(`ridepos2_js`)){
        if(rideposArr1[i1][0] == document.getElementById(`ridepos2_js`).innerHTML){
            ridepos2.innerHTML += `<option value="${rideposArr1[i1][0]}" selected>${rideposArr1[i1][1]}</option>`;
        }else{
            ridepos2.innerHTML += `<option value="${rideposArr1[i1][0]}">${rideposArr1[i1][1]}</option>`;
        }
    }else{
        ridepos2.disabled = true;
    }
}
for(var i1 = 0; i1 < rideposArr2.length; i1++){
    if(document.getElementById(`ridepos2num_js`)){
        if(rideposArr2[i1][0] == document.getElementById(`ridepos2num_js`).innerHTML){
            ridepos2num.innerHTML += `<option value="${rideposArr2[i1][0]}" selected>${rideposArr2[i1][1]}</option>`;
        }else{
            ridepos2num.innerHTML += `<option value="${rideposArr2[i1][0]}">${rideposArr2[i1][1]}</option>`;
        }
    }else{
        ridepos2num.disabled = true;
    }
}
for(var i1 = 0; i1 < destinationArr.length; i1++){
    if(document.getElementById(`destination2_js`)){
        if(destinationArr[i1][0] == document.getElementById(`destination2_js`).innerHTML){
            destination2.innerHTML += `<option value="${destinationArr[i1][0]}" selected>${destinationArr[i1][1]}</option>`;
        }else{
            destination2.innerHTML += `<option value="${destinationArr[i1][0]}">${destinationArr[i1][1]}</option>`;
        }
    }else{
        destination2.disabled = true;
    }
}
time2h.value = document.getElementById(`time2h_js`) ? document.getElementById(`time2h_js`).innerHTML : "";
time2h.disabled = document.getElementById(`time2h_js`) ? false : true;
time2m.value = document.getElementById(`time2m_js`) ? document.getElementById(`time2m_js`).innerHTML : "";
time2m.disabled = document.getElementById(`time2m_js`) ? false : true;

/* 3列車目 */
for(var i1 = 0; i1 < typeArr.length; i1++){
    if(typeArr[i1][0] == document.getElementById(`type3_js`).innerHTML){
        type3.innerHTML += `<option value="${typeArr[i1][0]}" selected>${typeArr[i1][1]}</option>`;
    }else{
        type3.innerHTML += `<option value="${typeArr[i1][0]}">${typeArr[i1][1]}</option>`;
    }/**/
}
for(var i1 = 0; i1 < rideposArr1.length; i1++){
    if(document.getElementById(`ridepos3_js`)){
        if(rideposArr1[i1][0] == document.getElementById(`ridepos3_js`).innerHTML){
            ridepos3.innerHTML += `<option value="${rideposArr1[i1][0]}" selected>${rideposArr1[i1][1]}</option>`;
        }else{
            ridepos3.innerHTML += `<option value="${rideposArr1[i1][0]}">${rideposArr1[i1][1]}</option>`;
        }
    }else{
        ridepos3.disabled = true;
    }
}
for(var i1 = 0; i1 < rideposArr2.length; i1++){
    if(document.getElementById(`ridepos3num_js`)){
        if(rideposArr2[i1][0] == document.getElementById(`ridepos3num_js`).innerHTML){
            ridepos3num.innerHTML += `<option value="${rideposArr2[i1][0]}" selected>${rideposArr2[i1][1]}</option>`;
        }else{
            ridepos3num.innerHTML += `<option value="${rideposArr2[i1][0]}">${rideposArr2[i1][1]}</option>`;
        }
    }else{
        ridepos3num.disabled = true;
    }
}
for(var i1 = 0; i1 < destinationArr.length; i1++){
    if(document.getElementById(`destination3_js`)){
        if(destinationArr[i1][0] == document.getElementById(`destination3_js`).innerHTML){
            destination3.innerHTML += `<option value="${destinationArr[i1][0]}" selected>${destinationArr[i1][1]}</option>`;
        }else{
            destination3.innerHTML += `<option value="${destinationArr[i1][0]}">${destinationArr[i1][1]}</option>`;
        }
    }else{
        destination3.disabled = true;
    }
}
time3h.value = document.getElementById(`time3h_js`) ? document.getElementById(`time3h_js`).innerHTML : "";
time3h.disabled = document.getElementById(`time3h_js`) ? false : true;
time3m.value = document.getElementById(`time3m_js`) ? document.getElementById(`time3m_js`).innerHTML : "";
time3m.disabled = document.getElementById(`time3m_js`) ? false : true;

/* 4列車目 */
for(var i1 = 0; i1 < typeArr.length; i1++){
    if(typeArr[i1][0] == document.getElementById(`type4_js`).innerHTML){
        type4.innerHTML += `<option value="${typeArr[i1][0]}" selected>${typeArr[i1][1]}</option>`;
    }else{
        type4.innerHTML += `<option value="${typeArr[i1][0]}">${typeArr[i1][1]}</option>`;
    }/**/
}
for(var i1 = 0; i1 < rideposArr1.length; i1++){
    if(document.getElementById(`ridepos4_js`)){
        if(rideposArr1[i1][0] == document.getElementById(`ridepos4_js`).innerHTML){
            ridepos4.innerHTML += `<option value="${rideposArr1[i1][0]}" selected>${rideposArr1[i1][1]}</option>`;
        }else{
            ridepos4.innerHTML += `<option value="${rideposArr1[i1][0]}">${rideposArr1[i1][1]}</option>`;
        }
    }else{
        ridepos4.disabled = true;
    }
}
for(var i1 = 0; i1 < rideposArr2.length; i1++){
    if(document.getElementById(`ridepos4num_js`)){
        if(rideposArr2[i1][0] == document.getElementById(`ridepos4num_js`).innerHTML){
            ridepos4num.innerHTML += `<option value="${rideposArr2[i1][0]}" selected>${rideposArr2[i1][1]}</option>`;
        }else{
            ridepos4num.innerHTML += `<option value="${rideposArr2[i1][0]}">${rideposArr2[i1][1]}</option>`;
        }
    }else{
        ridepos4num.disabled = true;
    }
}
for(var i1 = 0; i1 < destinationArr.length; i1++){
    if(document.getElementById(`destination4_js`)){
        if(destinationArr[i1][0] == document.getElementById(`destination4_js`).innerHTML){
            destination4.innerHTML += `<option value="${destinationArr[i1][0]}" selected>${destinationArr[i1][1]}</option>`;
        }else{
            destination4.innerHTML += `<option value="${destinationArr[i1][0]}">${destinationArr[i1][1]}</option>`;
        }
    }else{
        destination4.disabled = true;
    }
}
time4h.value = document.getElementById(`time4h_js`) ? document.getElementById(`time4h_js`).innerHTML : "";
time4h.disabled = document.getElementById(`time4h_js`) ? false : true;
time4m.value = document.getElementById(`time4m_js`) ? document.getElementById(`time4m_js`).innerHTML : "";
time4m.disabled = document.getElementById(`time4m_js`) ? false : true;


type1.addEventListener('change', ()=>{ 
    const resetter1 = () =>{
        ridepos1.innerHTML = ``;
        ridepos1num.innerHTML = ``;
        destination1.innerHTML = ``;
    }
    switch(type1.value){
        case '　　　,n':
        case '回　送,n':
        case '通　過,n':
            if(!ridepos1.disabled){
                ridepos1.disabled = true;
                ridepos1num.disabled = true;
                time1h.disabled = true;
                time1m.disabled = true;
                destination1.disabled = true;
                behind1t.disabled = true;
                behind1f.disabled = true;
                behind1time.disabled = true;

                resetter1();
                
                ridepos1.innerHTML = `<option value=""></option>`;
                ridepos1num.innerHTML = `<option value=""></option>`;
                destination1.innerHTML = `<option value=""></option>`;

                time1h.value = "";
                time1m.value = "";
                break;
            }
        case '特　急,n':
            if(ridepos1.disabled){
                ridepos1.disabled = false;
                ridepos1num.disabled = false;
                time1h.disabled = false;
                time1m.disabled = false;
                destination1.disabled = false;
                behind1t.disabled = false;
                behind1f.disabled = false;
                if (behind1t.checked) {
                    behind1time.disabled = false;
                } else {
                    behind1time.disabled = true;
                }

                resetter1();

                for(var i1 = 0; i1 < rideposArr1.length; i1++){
                    if(rideposArr1[i1][0] == document.getElementById(`ridepos1_js`).innerHTML){
                        ridepos1.innerHTML += `<option value="${rideposArr1[i1][0]}" selected>${rideposArr1[i1][1]}</option>`;
                    }else{
                        ridepos1.innerHTML += `<option value="${rideposArr1[i1][0]}">${rideposArr1[i1][1]}</option>`;
                    }
                }
                for(var i1 = 0; i1 < rideposArr2.length; i1++){
                    if(rideposArr2[i1][0] == document.getElementById(`ridepos1num_js`).innerHTML){
                        ridepos1num.innerHTML += `<option value="${rideposArr2[i1][0]}" selected>${rideposArr2[i1][1]}</option>`;
                    }else{
                        ridepos1num.innerHTML += `<option value="${rideposArr2[i1][0]}">${rideposArr2[i1][1]}</option>`;
                    }
                }
                for(var i1 = 0; i1 < destinationArr.length; i1++){
                    if(destinationArr[i1][0] == document.getElementById(`destination1_js`).innerHTML){
                        destination1.innerHTML += `<option value="${destinationArr[i1][0]}" selected>${destinationArr[i1][1]}</option>`;
                    }else{
                        destination1.innerHTML += `<option value="${destinationArr[i1][0]}">${destinationArr[i1][1]}</option>`;
                    }
                }
                time1h.value = document.getElementById(`time1h_js`) ? document.getElementById(`time1h_js`).innerHTML : "12";
                time1m.value = document.getElementById(`time1m_js`) ? document.getElementById(`time1m_js`).innerHTML : "0";
            }
            break;
        default:
            if(ridepos1.disabled){
                ridepos1.disabled = false;
                ridepos1num.disabled = false;
                time1h.disabled = false;
                time1m.disabled = false;
                destination1.disabled = false;
                behind1t.disabled = false;
                behind1f.disabled = false;
                if (behind1t.checked) {
                    behind1time.disabled = false;
                } else {
                    behind1time.disabled = true;
                }

                resetter1();

                for(var i1 = 0; i1 < rideposArr1.length; i1++){
                    if(rideposArr1[i1][0] == document.getElementById(`ridepos1_js`)){
                        if(rideposArr1[i1][0] == document.getElementById(`ridepos1_js`).innerHTML){
                            ridepos1.innerHTML += `<option value="${rideposArr1[i1][0]}" selected>${rideposArr1[i1][1]}</option>`;
                        }else{
                            ridepos1.innerHTML += `<option value="${rideposArr1[i1][0]}">${rideposArr1[i1][1]}</option>`;
                        }
                    }else{
                        if(i1 == 0){
                            ridepos1.innerHTML += `<option value="${rideposArr1[i1][0]}" selected>${rideposArr1[i1][1]}</option>`;
                        }else{
                            ridepos1.innerHTML += `<option value="${rideposArr1[i1][0]}">${rideposArr1[i1][1]}</option>`;
                        }
                    }
                }
                for(var i1 = 0; i1 < rideposArr2.length; i1++){
                    if(rideposArr2[i1][0] == document.getElementById(`ridepos1num_js`)){
                        if(rideposArr2[i1][0] == document.getElementById(`ridepos1num_js`).innerHTML){
                            ridepos1num.innerHTML += `<option value="${rideposArr2[i1][0]}" selected>${rideposArr2[i1][1]}</option>`;
                        }else{
                            ridepos1num.innerHTML += `<option value="${rideposArr2[i1][0]}">${rideposArr2[i1][1]}</option>`;
                        }
                    }else{
                        if(i1 == 0){
                            ridepos1num.innerHTML += `<option value="${rideposArr2[i1][0]}" selected>${rideposArr2[i1][1]}</option>`;
                        }else{
                            ridepos1num.innerHTML += `<option value="${rideposArr2[i1][0]}">${rideposArr2[i1][1]}</option>`;
                        }
                    }
                }
                for(var i1 = 0; i1 < destinationArr.length; i1++){
                    if(document.getElementById(`destination1_js`)){
                        if(destinationArr[i1][0] == document.getElementById(`destination1_js`).innerHTML){
                            destination1.innerHTML += `<option value="${destinationArr[i1][0]}" selected>${destinationArr[i1][1]}</option>`;
                        }else{
                            destination1.innerHTML += `<option value="${destinationArr[i1][0]}">${destinationArr[i1][1]}</option>`;
                        }
                    }else{
                        if(i1 == 0){
                            destination1.innerHTML += `<option value="${destinationArr[i1][0]}" selected>${destinationArr[i1][1]}</option>`;
                        }else{
                            destination1.innerHTML += `<option value="${destinationArr[i1][0]}">${destinationArr[i1][1]}</option>`;
                        }
                    }
                }
                time1h.value = document.getElementById(`time1h_js`) ? document.getElementById(`time1h_js`).innerHTML : "12";
                time1m.value = document.getElementById(`time1m_js`) ? document.getElementById(`time1m_js`).innerHTML : "0";
            }
            break;
    }
});

if(
    !behind1t.disabled && !behind1f.disabled
){
    behind1t.addEventListener('change', () => {
        if (behind1f.checked) {
            behind1time.disabled = true;
        } else {
            behind1time.disabled = false;
        }
    });

    behind1f.addEventListener('change', () => {
        if (behind1t.checked) {
            behind1time.disabled = false;
        } else {
            behind1time.disabled = true;
        }
    });
}

type2.addEventListener('change', ()=>{ 
    const resetter2 = () =>{
        ridepos2.innerHTML = ``;
        ridepos2num.innerHTML = ``;
        destination2.innerHTML = ``;
    }

    switch(type2.value){
        case '　　　,n':
        case '回　送,n':
        case '通　過,n':
            if(!ridepos2.disabled){
                ridepos2.disabled = true;
                ridepos2num.disabled = true;
                time2h.disabled = true;
                time2m.disabled = true;
                destination2.disabled = true;
                behind2t.disabled = true;
                behind2f.disabled = true;
                behind2time.disabled = true;

                resetter2();
                
                ridepos2.innerHTML = `<option value=""></option>`;
                ridepos2num.innerHTML = `<option value=""></option>`;
                destination2.innerHTML = `<option value=""></option>`;

                time2h.value = "";
                time2m.value = "";
            }
            break;
        default:
            if(ridepos2.disabled){
                ridepos2.disabled = false;
                ridepos2num.disabled = false;
                time2h.disabled = false;
                time2m.disabled = false;
                destination2.disabled = false;
                behind2t.disabled = false;
                behind2f.disabled = false;
                if (behind2t.checked) {
                    behind2time.disabled = false;
                } else {
                    behind2time.disabled = true;
                }

                resetter2();

                for(var i1 = 0; i1 < rideposArr1.length; i1++){
                    if(document.getElementById(`ridepos2_js`)){
                        if(rideposArr1[i1][0] == document.getElementById(`ridepos2_js`).innerHTML){
                            ridepos2.innerHTML += `<option value="${rideposArr1[i1][0]}" selected>${rideposArr1[i1][1]}</option>`;
                        }else{
                            ridepos2.innerHTML += `<option value="${rideposArr1[i1][0]}">${rideposArr1[i1][1]}</option>`;
                        }
                    }else{
                        if(i1 == 0){
                            ridepos2.innerHTML += `<option value="${rideposArr1[i1][0]}" selected>${rideposArr1[i1][1]}</option>`;
                        }else{
                            ridepos2.innerHTML += `<option value="${rideposArr1[i1][0]}">${rideposArr1[i1][1]}</option>`;
                        }
                    }
                }
                for(var i1 = 0; i1 < rideposArr2.length; i1++){
                    if(document.getElementById(`ridepos2_js`)){
                        if(rideposArr2[i1][0] == document.getElementById(`ridepos2num_js`).innerHTML){
                            ridepos2num.innerHTML += `<option value="${rideposArr2[i1][0]}" selected>${rideposArr2[i1][1]}</option>`;
                        }else{
                            ridepos2num.innerHTML += `<option value="${rideposArr2[i1][0]}">${rideposArr2[i1][1]}</option>`;
                        }
                    }else{
                        if(i1 == 0){
                            ridepos2num.innerHTML += `<option value="${rideposArr2[i1][0]}" selected>${rideposArr2[i1][1]}</option>`;
                        }else{
                            ridepos2num.innerHTML += `<option value="${rideposArr2[i1][0]}">${rideposArr2[i1][1]}</option>`;
                        }
                    }
                }
                for(var i1 = 0; i1 < destinationArr.length; i1++){
                    if(document.getElementById(`destination2_js`)){
                        if(destinationArr[i1][0] == document.getElementById(`destination2_js`).innerHTML){
                            destination2.innerHTML += `<option value="${destinationArr[i1][0]}" selected>${destinationArr[i1][1]}</option>`;
                        }else{
                            destination2.innerHTML += `<option value="${destinationArr[i1][0]}">${destinationArr[i1][1]}</option>`;
                        }
                    }else{
                        if(i1 == 0){
                            destination2.innerHTML += `<option value="${destinationArr[i1][0]}" selected>${destinationArr[i1][1]}</option>`;
                        }else{
                            destination2.innerHTML += `<option value="${destinationArr[i1][0]}">${destinationArr[i1][1]}</option>`;
                        }
                    }
                }
                time2h.value = document.getElementById(`time2h_js`) ? document.getElementById(`time2h_js`).innerHTML : "12";
                time2m.value = document.getElementById(`time2m_js`) ? document.getElementById(`time2m_js`).innerHTML : "0";
            }
            break;
    }
});

if (
    !behind2t.disabled && !behind2f.disabled
) {
    behind2t.addEventListener('change', () => {
        if (behind2f.checked) {
            behind2time.disabled = true;
        } else {
            behind2time.disabled = false;
        }
    });

    behind2f.addEventListener('change', () => {
        if (behind2t.checked) {
            behind2time.disabled = false;
        } else {
            behind2time.disabled = true;
        }
    });
}

type3.addEventListener('change', ()=>{ 
    const resetter3 = () =>{
        ridepos3.innerHTML = ``;
        ridepos3num.innerHTML = ``;
        destination3.innerHTML = ``;
    }

    switch(type3.value){
        case '　　　,n':
        case '回　送,n':
        case '通　過,n':
            if(!ridepos3.disabled){
                ridepos3.disabled = true;
                ridepos3num.disabled = true;
                time3h.disabled = true;
                time3m.disabled = true;
                destination3.disabled = true;
                behind3t.disabled = true;
                behind3f.disabled = true;
                behind3time.disabled = true;

                resetter3();
                
                ridepos3.innerHTML = `<option value=""></option>`;
                ridepos3num.innerHTML = `<option value=""></option>`;
                destination3.innerHTML = `<option value=""></option>`;

                time3h.value = "";
                time3m.value = "";
            }
            break;
        default:
            if(ridepos3.disabled){
                ridepos3.disabled = false;
                ridepos3num.disabled = false;
                time3h.disabled = false;
                time3m.disabled = false;
                destination3.disabled = false;
                behind3t.disabled = false;
                behind3f.disabled = false;
                if (behind3t.checked) {
                    behind3time.disabled = false;
                } else {
                    behind3time.disabled = true;
                }

                resetter3();

                for(var i1 = 0; i1 < rideposArr1.length; i1++){
                    if(document.getElementById(`ridepos3_js`)){
                        if(rideposArr1[i1][0] == document.getElementById(`ridepos3_js`).innerHTML){
                            ridepos3.innerHTML += `<option value="${rideposArr1[i1][0]}" selected>${rideposArr1[i1][1]}</option>`;
                        }else{
                            ridepos3.innerHTML += `<option value="${rideposArr1[i1][0]}">${rideposArr1[i1][1]}</option>`;
                        }
                    }else{
                        if(i1 == 0){
                            ridepos3.innerHTML += `<option value="${rideposArr1[i1][0]}" selected>${rideposArr1[i1][1]}</option>`;
                        }else{
                            ridepos3.innerHTML += `<option value="${rideposArr1[i1][0]}">${rideposArr1[i1][1]}</option>`;
                        }
                    }
                }
                for(var i1 = 0; i1 < rideposArr2.length; i1++){
                    if(document.getElementById(`ridepos3num_js`)){
                        if(rideposArr2[i1][0] == document.getElementById(`ridepos3num_js`).innerHTML){
                            ridepos3num.innerHTML += `<option value="${rideposArr2[i1][0]}" selected>${rideposArr2[i1][1]}</option>`;
                        }else{
                            ridepos3num.innerHTML += `<option value="${rideposArr2[i1][0]}">${rideposArr2[i1][1]}</option>`;
                        }
                    }else{
                        if(i1 == 0){
                            ridepos3num.innerHTML += `<option value="${rideposArr2[i1][0]}" selected>${rideposArr2[i1][1]}</option>`;
                        }else{
                            ridepos3num.innerHTML += `<option value="${rideposArr2[i1][0]}">${rideposArr2[i1][1]}</option>`;
                        }
                    }
                }
                for(var i1 = 0; i1 < destinationArr.length; i1++){
                    if(document.getElementById(`destination3_js`)){
                        if(destinationArr[i1][0] == document.getElementById(`destination3_js`).innerHTML){
                            destination3.innerHTML += `<option value="${destinationArr[i1][0]}" selected>${destinationArr[i1][1]}</option>`;
                        }else{
                            destination3.innerHTML += `<option value="${destinationArr[i1][0]}">${destinationArr[i1][1]}</option>`;
                        }
                    }else{
                        if(i1 == 0){
                            destination3.innerHTML += `<option value="${destinationArr[i1][0]}" selected>${destinationArr[i1][1]}</option>`;
                        }else{
                            destination3.innerHTML += `<option value="${destinationArr[i1][0]}">${destinationArr[i1][1]}</option>`;
                        }
                    }
                }
                time3h.value = document.getElementById(`time3h_js`) ? document.getElementById(`time3h_js`).innerHTML : "12";
                time3m.value = document.getElementById(`time3m_js`) ? document.getElementById(`time3m_js`).innerHTML : "0";
            }
            break;
    }
});

if (
    !behind3t.disabled && !behind3f.disabled
) {
    behind3t.addEventListener('change', () => {
        if (behind3f.checked) {
            behind3time.disabled = true;
        } else {
            behind3time.disabled = false;
        }
    });

    behind3f.addEventListener('change', () => {
        if (behind3t.checked) {
            behind3time.disabled = false;
        } else {
            behind3time.disabled = true;
        }
    });
}

type4.addEventListener('change', ()=>{ 
    const resetter4 = () =>{
        ridepos4.innerHTML = ``;
        ridepos4num.innerHTML = ``;
        destination4.innerHTML = ``;
    }

    switch(type4.value){
        case '　　　,n':
        case '回　送,n':
        case '通　過,n':
            if(!ridepos4.disabled){
                ridepos4.disabled = true;
                ridepos4num.disabled = true;
                time4h.disabled = true;
                time4m.disabled = true;
                destination4.disabled = true;
                behind4t.disabled = true;
                behind4f.disabled = true;
                behind4time.disabled = true;

                resetter4();
                
                ridepos4.innerHTML = `<option value=""></option>`;
                ridepos4num.innerHTML = `<option value=""></option>`;
                destination4.innerHTML = `<option value=""></option>`;

                time4h.value = "";
                time4m.value = "";
            }
            break;
        default:
            if(ridepos4.disabled){
                ridepos4.disabled = false;
                ridepos4num.disabled = false;
                time4h.disabled = false;
                time4m.disabled = false;
                destination4.disabled = false;
                behind4t.disabled = false;
                behind4f.disabled = false;
                if (behind4t.checked) {
                    behind4time.disabled = false;
                } else {
                    behind4time.disabled = true;
                }

                resetter4();

                for(var i1 = 0; i1 < rideposArr1.length; i1++){
                    if(document.getElementById(`ridepos4_js`)){
                        if(rideposArr1[i1][0] == document.getElementById(`ridepos4_js`).innerHTML){
                            ridepos4.innerHTML += `<option value="${rideposArr1[i1][0]}" selected>${rideposArr1[i1][1]}</option>`;
                        }else{
                            ridepos4.innerHTML += `<option value="${rideposArr1[i1][0]}">${rideposArr1[i1][1]}</option>`;
                        }
                    }else{
                        if(i1 == 0){
                            ridepos4.innerHTML += `<option value="${rideposArr1[i1][0]}" selected>${rideposArr1[i1][1]}</option>`;
                        }else{
                            ridepos4.innerHTML += `<option value="${rideposArr1[i1][0]}">${rideposArr1[i1][1]}</option>`;
                        }
                    }
                }
                for(var i1 = 0; i1 < rideposArr2.length; i1++){
                    if(document.getElementById(`ridepos4num_js`)){
                        if(rideposArr2[i1][0] == document.getElementById(`ridepos4num_js`).innerHTML){
                            ridepos4num.innerHTML += `<option value="${rideposArr2[i1][0]}" selected>${rideposArr2[i1][1]}</option>`;
                        }else{
                            ridepos4num.innerHTML += `<option value="${rideposArr2[i1][0]}">${rideposArr2[i1][1]}</option>`;
                        }
                    }else{
                        if(i1 == 0){
                            ridepos4num.innerHTML += `<option value="${rideposArr2[i1][0]}" selected>${rideposArr2[i1][1]}</option>`;
                        }else{
                            ridepos4num.innerHTML += `<option value="${rideposArr2[i1][0]}">${rideposArr2[i1][1]}</option>`;
                        }
                    }
                }
                for(var i1 = 0; i1 < destinationArr.length; i1++){
                    if(document.getElementById(`destination4_js`)){
                        if(destinationArr[i1][0] == document.getElementById(`destination4_js`).innerHTML){
                            destination4.innerHTML += `<option value="${destinationArr[i1][0]}" selected>${destinationArr[i1][1]}</option>`;
                        }else{
                            destination4.innerHTML += `<option value="${destinationArr[i1][0]}">${destinationArr[i1][1]}</option>`;
                        }
                    }else{
                        if(i1 == 0){
                            destination4.innerHTML += `<option value="${destinationArr[i1][0]}" selected>${destinationArr[i1][1]}</option>`;
                        }else{
                            destination4.innerHTML += `<option value="${destinationArr[i1][0]}">${destinationArr[i1][1]}</option>`;
                        }
                    }
                }
                time4h.value = document.getElementById(`time4h_js`) ? document.getElementById(`time4h_js`).innerHTML : "12";
                time4m.value = document.getElementById(`time4m_js`) ? document.getElementById(`time4m_js`).innerHTML : "0";
            }
            break;
    }
});

if (
    !behind4t.disabled && !behind4f.disabled
) {
    behind4t.addEventListener('change', () => {
        if (behind4f.checked) {
            behind4time.disabled = true;
        } else {
            behind4time.disabled = false;
        }
    });

    behind4f.addEventListener('change', () => {
        if (behind4t.checked) {
            behind4time.disabled = false;
        } else {
            behind4time.disabled = true;
        }
    });
}


