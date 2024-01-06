/**
 * Block dependencies
 */
import icon from "./icon";
import "./style.scss";

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText } = wp.blockEditor;

/**
 * Register block
 */
export default registerBlockType("jsforwphowto/cfi-heading", {
  title: __("CFI Heading", "jsforwphowto"),
  description: __("CFI Style Heading.", "jsforwphowto"),
  category: "common",
  icon: {
    src: icon,
  },
  keywords: [__("Heading", "jsforwphowto")],
  attributes: {
    heading: {
      type: "array",
      source: "children",
      selector: ".entry-title",
    },
    anchor: {
      type: "string",
    },
  },
  supports: {
    anchor: true,
  },
  edit: (props) => {
    const {
      attributes: { heading, anchor },
      className,
      setAttributes,
    } = props;
    const onChangeHeading = (heading) => {
      setAttributes({ heading });
    };
    return (
      <header id={anchor} className={"entry-header " + className}>
        <RichText
          className="entry-title"
          tagName="h1"
          placeholder={__("Add heading", "jsforwphowto")}
          onChange={onChangeHeading}
          value={heading}
        />
        <hr />
      </header>
    );
  },
  save: (props) => {
    const {
      attributes: { heading, className, anchor },
    } = props;
    return (
      <header id={anchor} class={"entry-header " + className}>
        <h1 class="entry-title">{heading}</h1>
        <hr />
      </header>
    );
  },
});
