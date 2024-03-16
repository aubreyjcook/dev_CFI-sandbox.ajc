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
export default registerBlockType("jsforwphowto/cfi-subheading", {
  title: __("CFI Sub Heading", "jsforwphowto"),
  description: __("CFI Style Sub Heading.", "jsforwphowto"),
  category: "common",
  icon: {
    src: icon,
  },
  keywords: [__("Heading", "jsforwphowto")],
  attributes: {
    heading: {
      type: "array",
      source: "children",
      selector: ".sub-header h2",
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
      <header id={anchor} className={"sub-header clearfix " + className}>
        <RichText
          className="h3"
          tagName="h2"
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
      <header id={anchor} class={"sub-header clearfix " + className}>
        <h2 class="h3">{heading}</h2>
        <hr />
      </header>
    );
  },
});
