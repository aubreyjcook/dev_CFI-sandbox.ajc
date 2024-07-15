( function( blocks, element ) {
    var el = element.createElement;
    var blockStyle = {
        backgroundColor: '#900',
        color: '#fff',
        padding: '20px',
    };

    blocks.registerBlockType( 'custom-block/block', {
        title: 'Custom Block',
        icon: 'universal-access-alt',
        category: 'layout',
        example: {},
        edit: function() {
            return el(
                'p',
                { style: blockStyle },
                'Hello World, this is my custom block'
            );
        },
        save: function() {
            return el(
                'p',
                { style: blockStyle },
                'Hello World, this is my custom block'
            );
        },
    } );
}(
    window.wp.blocks,
    window.wp.element
) );