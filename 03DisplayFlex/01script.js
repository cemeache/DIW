document.getElementById('flex').addEventListener('click',()=>{
    document.getElementById('div-six').style.display = 'flex';
});

document.getElementById('inline-flex').addEventListener('click',()=>{
    document.getElementById('div-six').style.display = 'inline-flex';
});

/*  */

document.getElementById('row').addEventListener('click',()=>{
    document.getElementById('div-seven').style.flexDirection = 'row';
});

document.getElementById('row-reverse').addEventListener('click',()=>{
    document.getElementById('div-seven').style.flexDirection = 'row-reverse';
});

document.getElementById('column').addEventListener('click',()=>{
    document.getElementById('div-seven').style.flexDirection = 'column';
});

document.getElementById('column-reverse').addEventListener('click',()=>{
    document.getElementById('div-seven').style.flexDirection = 'column-reverse';
});

/* */

document.getElementById('nowrap').addEventListener('click', () => {
    document.getElementById('div-eigth').style.flexWrap = 'nowrap';
});

document.getElementById('wrap').addEventListener('click', () => {
    document.getElementById('div-eigth').style.flexWrap = 'wrap';
});

document.getElementById('wrap-reverse').addEventListener('click', () => {
    document.getElementById('div-eigth').style.flexWrap = 'wrap-reverse';
});

/**/
// Set gap to 10px for both row and column
document.getElementById('gapx').addEventListener('click', () => {
    document.getElementById('div-nine').style.gap = '10px';
});

// Set gap to 10px for row and 5px for column
document.getElementById('gapxx').addEventListener('click', () => {
    document.getElementById('div-nine').style.gap = '10px 5px';
});

// Set row-gap to 5px and column-gap to 20px
document.getElementById('rowGap').addEventListener('click', () => {
    document.getElementById('div-nine').style.rowGap = '5px';
    document.getElementById('div-nine').style.columnGap = '20px';
});