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

document.getElementById('gap0').addEventListener('click', () => {
    document.getElementById('div-nine').style.gap = '0px';
});

document.getElementById('gapx').addEventListener('click', () => {
    document.getElementById('div-nine').style.gap = '10px';
});

document.getElementById('gapxx').addEventListener('click', () => {
    document.getElementById('div-nine').style.gap = '20px 5px';
});

document.getElementById('rowGap').addEventListener('click', () => {
    document.getElementById('div-nine').style.rowGap = '5px';
    document.getElementById('div-nine').style.columnGap = '50px';
});

/**/

document.getElementById('start').addEventListener('click', () => {
    document.getElementById('div-ten').style.justifyContent = 'flex-start';
});

document.getElementById('end').addEventListener('click', () => {
    document.getElementById('div-ten').style.justifyContent = 'flex-end';
});

document.getElementById('center').addEventListener('click', () => {
    document.getElementById('div-ten').style.justifyContent = 'center';
});

document.getElementById('space-between').addEventListener('click', () => {
    document.getElementById('div-ten').style.justifyContent = 'space-between';
});

document.getElementById('space-around').addEventListener('click', () => {
    document.getElementById('div-ten').style.justifyContent = 'space-around';
});

document.getElementById('space-evenly').addEventListener('click', () => {
    document.getElementById('div-ten').style.justifyContent = 'space-evenly';
});

/**/

const container = document.getElementById('div-twelve');

// Botones justify-content
document.getElementById('twelve-start').addEventListener('click', () => {
    container.style.justifyContent = 'flex-start';
});

document.getElementById('twelve-end').addEventListener('click', () => {
    container.style.justifyContent = 'flex-end';
});

document.getElementById('twelve-center').addEventListener('click', () => {
    container.style.justifyContent = 'center';
});

document.getElementById('twelve-space-between').addEventListener('click', () => {
    container.style.justifyContent = 'space-between';
});

document.getElementById('twelve-space-around').addEventListener('click', () => {
    container.style.justifyContent = 'space-around';
});

document.getElementById('twelve-space-evenly').addEventListener('click', () => {
    container.style.justifyContent = 'space-evenly';
});

// Botones align-items

document.getElementById('twelve-align-start').addEventListener('click', () => {
    container.style.alignItems = 'flex-start';
});

document.getElementById('twelve-align-end').addEventListener('click', () => {
    container.style.alignItems = 'flex-end';
});

document.getElementById('twelve-align-center').addEventListener('click', () => {
    container.style.alignItems = 'center';
});

document.getElementById('twelve-align-baseline').addEventListener('click', () => {
    container.style.alignItems = 'baseline';
});

/* */ 

const containerThirteen = document.getElementById('div-thirteen');

// Botones align-content
document.getElementById('thirteen-content-start').addEventListener('click', () => {
    containerThirteen.style.alignContent = 'flex-start';
});

document.getElementById('thirteen-content-end').addEventListener('click', () => {
    containerThirteen.style.alignContent = 'flex-end';
});

document.getElementById('thirteen-content-center').addEventListener('click', () => {
    containerThirteen.style.alignContent = 'center';
});

document.getElementById('thirteen-content-space-between').addEventListener('click', () => {
    containerThirteen.style.alignContent = 'space-between';
});

document.getElementById('thirteen-content-space-around').addEventListener('click', () => {
    containerThirteen.style.alignContent = 'space-around';
});

document.getElementById('thirteen-content-stretch').addEventListener('click', () => {
    containerThirteen.style.alignContent = 'stretch';
});
