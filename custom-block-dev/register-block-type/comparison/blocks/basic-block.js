// blocks/basic-block.js

const { registerBlockType } = wp.blocks;

registerBlockType('my-theme/basic-block', {
    title: 'Basic Block',
    icon: 'smiley',
    category: 'text',
    edit: () => {
        return (
            <div className="basic-block">
                <p>Basic Block Content</p>
            </div>
        );
    },
    save: () => {
        return (
            <div className="basic-block">
                <p>Basic Block Content</p>
            </div>
        );
    },
});